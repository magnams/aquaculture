

<?php $PageTitle="จัดการบ่อเลี้ยง-Pond Management" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php

      // $_SESSION['user_id'] = 99;

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
          $date = date("Y-m-d H:i:s", strtotime('+6 hours'));
          $sql = "INSERT INTO `pond_header`(`user_id`, `pond_name`, `updated_at`) VALUES ( $_SESSION[user_id],'$_POST[pond_name]','$date' )";
                    
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
      <?php $mainPageLink="pond_header.php" ?>
      <?php $mainPage="Pond Header Management" ?>
      <?php $activePage=$PageTitle ?>
      <?php include 'layout/breadcrumb.php';?>
                
      <!-- content start here-->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="card"> 
              <div class="card-title">
                <h4>Pond Header New</h4>
                <p style="font-size: medium;">( เพิ่มชื่อบ่อเลี้ยง )</p>
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
                        <button type="submit" class="btn btn-primary btn-addon m-b-10 m-l-5"><i class="ti-plus"></i>Insert</button>&nbsp;
                        <button type="button" id="btnClear" class="btn btn-default btn-addon m-b-10 m-l-5"><i class="ti-reload"></i>Clear</button> 
                    </form>
                </div>
              </div>  
            </div>
            <div>
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

  $( document ).ready(function() {
    $("#btnClear").click(function(){
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

