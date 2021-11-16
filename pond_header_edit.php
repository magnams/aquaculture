
<?php $PageTitle="แก้ไขรายการบ่อเลี้ยง-Edit Pond Header" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php

      $_SESSION['user_id'] = 99;
      $id = $_GET['id'];
      
      
      $result =  $conn->query("SELECT * FROM `pond_header` WHERE `pond_header_id` = $id LIMIT 1;")->fetch_assoc();
      

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
          $sql = "UPDATE `pond_header` SET `user_id`=$_SESSION[user_id],`pond_name`='$_POST[pond_name]',`updated_at`='$date' WHERE `pond_header_id` = $id";
                    
          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>Edit record successfully</p>";
            $text =  '<b>Your Input:</b>' . '<ul><li>- Pond Header ID: ' . $id . '</li><li>- Pond Name: ' . $name . '</li></ul>';
            // $id += 1;
            // set new variables
            $result['pond_name'] = $_POST['pond_name'];
          }
        } 
      }
      unset($_POST);

  ?>
  
  
      

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPage="Dashboard" ?>
      <?php $activePage="Pond-Header-Edit" ?>
      <?php include 'layout/breadcrumb.php';?>
                
      <!-- content start here-->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="card"> 
              <div class="card-title">
                <h4>Pond Header Edit</h4>
                <p style="font-size: medium;">( แก้ไขชื่อบ่อเลี้ยง )</p>
              </div>  
              <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
                        <div class="form-group">
                            <label>Pond Header ID:</label>
                            <input type="text" class="form-control input-default" placeholder="รหัสบ่อเลี้ยง" name="pond_header_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Pond Name:</label><code> * <?php echo $nameErr;?></code>
                            <input type="text" class="form-control input-default" placeholder="ระบุชื่อบ่อเลี้ยง" name="pond_name" id="pond_name" value="<?php echo $result['pond_name']; ?>">
                        </div>
                        <button type="submit" id="btnEdit" class="btn btn-warning btn-addon btn-block" onclick="return confirm('Do you really want to edit?');"><i class="ti-pencil-alt"></i>Confirm to Edit</button>   
                    </form>
                </div>
              </div>  
            </div>
            <div>

              <?php if( $success == True ) : ?> 
                
                <div class="alert alert-secondary">
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
          <div class="col-lg-6">
            <div class="card" style="background: inherit;">
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_explore_re_8l4v_y.svg" alt="">  
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
  

  $( document ).ready(function() {
    $("#btnEdit").click(function(){
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

