

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
                <div class="card-title" style="position: relative;">
                    <h4>Table Basic </h4>
                    <span>
                      <button style="position: absolute; right:0">New</button>
                    </span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pond Header ID</th>
                                    <th>Pond Name</th>
                                    <th>Created Date</th>
                                    <th>Update Date</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($result as $value): ?>
                                  <tr>
                                      <td> <?php echo $value["pond_header_id"]; ?></td>
                                      <td><span class="badge badge-primary"><?php echo $value["pond_name"]; ?></span></td>
                                      <td><?php echo $value["created_at"]; ?></td>
                                      <td class="color-primary"><?php echo $value["updated_at"]; ?></td>
                                      <td>
                                        <a href="pond_header_edit.php?id=<?php echo $value["pond_header_id"]; ?>">Edit</a>&nbsp;
                                        <a href="pond_header_delete.php?id=<?php echo $value["pond_header_id"]; ?>" onclick="return confirm('Do you really want to delete?');">Delete</a>
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
            <div class="card">
              <img src="https://www.technologychaoban.com/wp-content/uploads/2016/07/Saway-8-1024x683.jpg" alt="kung">  
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

