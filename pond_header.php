

<?php $PageTitle="รายการชื่อบ่อเลี้ยง-Pond Header Table" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php
  
    $_SESSION['user_id'] = 99;
  
    $sql = "SELECT `pond_header_id`, `pond_name`, `created_at`, `updated_at` FROM `pond_header` WHERE user_id = $_SESSION[user_id];";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $success = True;
      // output data of each row
      // $row = $result->fetch_assoc();
      // while($row = $result->fetch_assoc()) {
      //   echo "id: " . $row["pond_header_id"]. " - Name: " . $row["pond_name"]. " " . $row["created_at"]. " ". $row["updated_at"]."<br>";
      // }
    } else {
      echo "0 results";
    }
    $conn->close();
  ?>

 

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPage="Dashboard" ?>
      <?php $activePage="Pond-Header-Management" ?>
      <?php include 'layout/breadcrumb.php';?>
                
      <!-- content start here-->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
                <div class="card-title" style="position: relative; margin-bottom: inherit;">
                    <h4>Pond Header Management</h4>
                    <span>
                      <button style="position: absolute; right:0" onClick="javascript:window.open('pond_header_add.php', '_blank');" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"> 
                        <i class="ti-plus"></i>Add New Header</button>
                    </span>
                    <p style="font-size: medium;">( รายการชื่อบ่อเลี้ยง )</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pond Header ID</th>
                                    <th>Pond Name</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($result as $value): ?>
                                  <tr>
                                      <td> <?php echo $value["pond_header_id"]; ?></td>
                                      <td><span class="badge badge-primary"><?php echo $value["pond_name"]; ?></span></td>
                                      <td><?php echo $value["created_at"]; ?></td>
                                      <td><?php echo $value["updated_at"]; ?></td>
                                      <td>
                                        <a href="pond_header_edit.php?id=<?php echo $value["pond_header_id"]; ?>">
                                          <i class="ti-pencil-alt" style="color: inherit; font-size: large;"></i>
                                        </a>&nbsp;
                                        <a href="pond_header_delete.php?id=<?php echo $value["pond_header_id"]; ?>" onclick="return confirm('Do you really want to delete?');">
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
          <div class="col-lg-6">
            <div class="card" style="background: inherit;">
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_explore_re_8l4v_b.svg" alt="">  
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

