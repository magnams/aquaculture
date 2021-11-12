

<?php $PageTitle="จัดการบ่อเลี้ยง-Pond Management" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php
      // define variables
      $id = "SELECT MAX( id ) FROM pond_header;" + 1;
      $name = "";
      $idErr = $nameErr = ""; ?>

      

      


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
              <div class="card-title">
                <h4>Pond Header Management</h4>
                <p>เพิ่มชื่อบ่อเลี้ยง</p>
              </div>  
              <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label>Pond Header ID:</label>
                            <input type="text" class="form-control input-default " placeholder="รหัสบ่อเลี้ยง" name="pond_header_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Pond Name:</label><code> * <?php echo $nameErr;?></code>
                            <input type="text" class="form-control input-default " placeholder="ระบุชื่อบ่อเลี้ยง" name="pond_name" id="pond_name">
                        </div>
                        <button type="submit" class="btn btn-primary-lg">Insert</button>   
                        <button type="button" id="btnReset" class="btn btn-secondary-lg">Reset</button>                        
                    </form>
                </div>
            </div>  
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <img src="https://image.bangkokbiznews.com/image/kt/media/image/pr/2018/03/23/38634/750x422_38634_1521801366.jpg" alt="kung">  
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
              
            <?php

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["pond_header_id"])) {
                  $idErr = "Pond Header ID is required";
                } else {
                  $id = $_POST["pond_header_id"];
                }
                if (empty($_POST["pond_name"])) {
                  $nameErr = "Pond Name is required";
                } else {
                  $name = $_POST["pond_name"];
                }

                if ( empty($idErr) && empty($nameErr) ) {
                  $date = date('Y-m-d H:i:s');
                  $sql = "INSERT INTO `pond_header`(`user_id`, `pond_name`, `updated_at`) VALUES ( '99','$_POST[pond_name]','$date' )";
                            
                  if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    echo "<p><b>Your Input:</b>" . ' ' . $id . ' ' . $name . '</p>';
                  }
                } 
              }
              
              $conn->close();

            ?>
          </div>
        </div>
        <?php include 'layout/copyright.php';?>
      </section>
      <!-- content end-->






    </div>
  </div>
</div>
<script>

  $( document ).ready(function() {
    $("#btnReset").click(function(){
        // $("#pond_name").value() = "";
        location.reload();
    });
  });

</script>
    <?php include 'layout/footer.php';?>
</body>

</html>

