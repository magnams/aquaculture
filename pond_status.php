

<?php $PageTitle="Pond Status Management" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php
  
    $_SESSION['user_id'] = 99;
  
    $sql = "SELECT a.`pond_id`, b.`pond_name`, a.`pond_header_id`, a.`start_stocking_date`, a.`end_stocking_date`, a.`revenue`, a.`updated_at` 
            FROM `pond` a
            INNER JOIN `pond_header` b on a.pond_header_id = b.pond_header_id
            WHERE b.user_id = $_SESSION[user_id];";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $success = True;
      

    } else {
      echo "0 results";
    }
    $conn->close();
  ?>

 

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPage="Dashboard" ?>
      <?php $activePage=$PageTitle ?>
      <?php include 'layout/breadcrumb.php';?>
                
      <!-- content start here-->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-title" style="position: relative; margin-bottom: inherit;">
                    <h4><?php echo $PageTitle ?></h4>
                    <span>
                      <button style="position: absolute; right:0" onClick="javascript:window.open('pond_status_add.php', '_blank');" class="btn btn-primary btn-addon m-b-10 m-l-5"> 
                        <i class="ti-plus"></i>Add New Pond</button>
                    </span>
                    <p style="font-size: medium;">( รายการสถานะบ่อเลี้ยง )</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Pond ID</th>
                                    <th>Pond Name</th>
                                    <th>Start Stocking Date</th>
                                    <th>End Stocking Date</th>
                                    <th>Revenue</th>
                                    <th>Updated Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($result as $value): ?>
                                  <tr>
                                      <td><?php echo $value["pond_id"]; ?></td>
                                      <td><?php echo $value["pond_name"]; ?></td>
                                      <td><?php echo $value["start_stocking_date"]; ?></td>
                                      <td><?php echo $value["end_stocking_date"]; ?></td>
                                      <td class="color-success"><?php echo $value["revenue"]; ?></td>
                                      <td><?php echo $value["updated_at"]; ?></td>
                                      
                                      <td>
                                        <?php if( (isset($value["end_stocking_date"]) ? $value["end_stocking_date"] : date("Y-m-d H:i:s", strtotime('+6 hours')) ) >= date("Y-m-d H:i:s", strtotime('+6 hours'))  ) : ?> 
                                          <span class="badge badge-primary">active</span>
                                          
                                        <?php else : ?> 
                                            <span class="badge badge-danger">Inactive</span>

                                        <?php endif; ?>
                                      </td>

                                      <td>
                                        <a href="pond_status_edit.php?id=<?php echo $value["pond_id"]; ?>">
                                          <i class="ti-pencil-alt" style="color: inherit; font-size: large;"></i>
                                        </a>&nbsp;
                                        <a href="pond_status_delete.php?id=<?php echo $value["pond_id"]; ?>" onclick="return confirm('Do you really want to delete?');">
                                          <i class="ti-trash" style="color: red; font-size: large;"></i>
                                        </a>
                                      </td>
                                  </tr>                                
                              <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>


      
        <?php include 'layout/copyright.php';?>
      </section>
      <!-- content end-->






    </div>
  </div>
</div>
<script>

</script>
    <?php include 'layout/footer.php';?>
</body>

</html>
