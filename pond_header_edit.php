

<?php $PageTitle="แก้ไขรายการบ่อเลี้ยง-Edit Pond Header" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php
      // define variables
      $result =  $conn->query("SELECT MAX( pond_header_id  ) FROM pond_header;");
      $id = mysqli_fetch_array($result)[0] + 1;
      // var_dump($id);
      $name = "";
      $idErr = $nameErr = ""; 
      $success = False;
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["pond_name"])) {
          $nameErr = "Pond Name is required";
        } else {
          $name = $_POST["pond_name"];
        }
      }

      if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if ( (empty($nameErr)) )  {
          $date = date('Y-m-d H:i:s');
          $sql = "INSERT INTO `pond_header`(`user_id`, `pond_name`, `updated_at`) VALUES ( '99','$_POST[pond_name]','$date' )";
                    
          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>New record created successfully</p>";
            $text =  '<b>Your Input:</b>' . '<ul><li>- Pond Header ID: ' . $id . '</li><li>- Pond Name: ' . $name . '</li></ul>';
            $id += 1;
          }
        } 
      }
      unset($_POST);

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
              <div class="card-title">
                <h4>Pond Header Management</h4>
                <p>เพิ่มชื่อบ่อเลี้ยงสำหรับเลี้ยงสัตว์น้ำ</p>
              </div>  
              <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label>Pond Header ID:</label>
                            <input type="text" class="form-control input-default" placeholder="รหัสบ่อเลี้ยง" name="pond_header_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Pond Name:</label><code> * <?php echo $nameErr;?></code>
                            <input type="text" class="form-control input-default" placeholder="ระบุชื่อบ่อเลี้ยง" name="pond_name" id="pond_name">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"><i class="ti-plus"></i>Edit</button>   
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
          <div class="col-lg-6">

              <?php if( $success == True ) : ?> 
                
                <div class="alert alert-info">
                  <?php echo $newRecord ?>
                  <?php echo $text ?>
                </div>
                
              <?php elseif( !(empty($nameErr)) ) : ?>
                  
                  <div class="alert alert-danger">Error: Please Fill Required Form !!</div>

              <?php else : ?> 
                  

              <?php endif; ?>
              

              <?php $conn->close(); ?>
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
        location.reload();
    });
  });

  if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
  }   

</script>
    <?php include 'layout/footer.php';?>
</body>

</html>
