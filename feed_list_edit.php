
<?php $PageTitle="Edit Feed" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>

  <?php

      $id = $_GET['id'];
      $Pond_ID = $_GET['pond_id'];
      $Product_ID = $_GET['product_id'];
      
      $sql = "SELECT * FROM `feed_list` WHERE `feed_id` = $id";
      $result =  $conn->query($sql)->fetch_assoc();
      
      

      $sql_pond_name = "SELECT b.`pond_name` FROM `pond` a
                        INNER JOIN `pond_header` b on a.pond_header_id = b.pond_header_id
                        WHERE a.`pond_id` = $Pond_ID";
      $result_pond_name = $conn->query($sql_pond_name)->fetch_assoc();

      // var_dump($result_pond_name);
      // echo '<br>' . $result_pond_name["pond_name"];

      $sql_product_name = "SELECT * FROM product WHERE product_id = $Product_ID";
      $result_product_name = $conn->query($sql_product_name)->fetch_assoc();



      $name = "";
      $idErr = $nameErr = ""; 
      $success = False;
      

      if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if ( (empty($nameErr)) )  {
          $date = date("Y-m-d H:i:s", strtotime('+6 hours'));

          //end_date
          $end_date = date_create($_POST['final_check_date']);
        
              $end_time = $_POST['final_check_time'];
              $end_hour = substr($end_time,0,2);
              $end_minutes = substr($end_time,3,2);

          date_time_set($end_date, $end_hour, $end_minutes);

          $end_date = date_format($end_date, 'Y-m-d H:i:s');
          // echo $end_date





          $sql = "UPDATE `feed_list` SET 
                  `Final_Check_Time`='$end_date',
                  `ABW`='$_POST[abw]',
                  `Feed_Meal1`='$_POST[feed_meal1]',
                  `Feed_Meal2`='$_POST[feed_meal2]',
                  `Feed_Meal3`='$_POST[feed_meal3]',
                  `Feed_Meal4`='$_POST[feed_meal4]',
                  `Feed_Meal5`='$_POST[feed_meal5]',
                  `Remaining_Feed`='$_POST[remaining_feed]',
                  `updated_at`='$date' WHERE `feed_id` = $id";
          
          
          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>Edit record successfully</p>";
            $text =  '<b>Your Input:</b>' . 
                    '<ul><li>- Feed ID: ' . $id . 
                    '</li><li>- Final Check Time: ' . $_POST['final_check_date'] . ' ' . $_POST['final_check_time'] . 
                    '</li><li>- ABW: ' . $_POST['abw'] . 
                    '</li><li>- Feed Meal 1: ' . $_POST['feed_meal1'] . 
                    '</li><li>- Feed Meal 2: ' . $_POST['feed_meal2'] . 
                    '</li><li>- Feed Meal 3: ' . $_POST['feed_meal3'] . 
                    '</li><li>- Feed Meal 4: ' . $_POST['feed_meal4'] . 
                    '</li><li>- Feed Meal 5: ' . $_POST['feed_meal5'] . 
                    '</li><li>- Remaining Feed: ' . $_POST['remaining_feed'] . 
                    '</li><li>- Updated Date: ' . $date . 
                    '</li></ul>';

            // for refresh new values
            $result['final_check_date'] = $_POST['final_check_date'];
            $result['final_check_time'] = $_POST['final_check_time'];
            $result['abw'] = $_POST['abw'];
            $result['feed_meal1'] = $_POST['feed_meal1'];
            $result['feed_meal2'] = $_POST['feed_meal2'];
            $result['feed_meal3'] = $_POST['feed_meal3'];
            $result['feed_meal4'] = $_POST['feed_meal4'];
            $result['feed_meal5'] = $_POST['feed_meal5'];
            $result['remaining_feed'] = $_POST['remaining_feed'];
          }
        } 
      }
      unset($_POST);

  ?>
  
  
      

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPageLink="feed_list.php" ?>
      <?php $mainPage="Feed Records" ?>
      <?php $activePage=$PageTitle ?>
      <?php include 'layout/breadcrumb.php';?>
                
      <!-- content start here-->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="card"> 
              <div class="card-title">
                <h4><?php echo $PageTitle ?></h4>
                <p style="font-size: medium;">( แก้ไขข้อมูลการให้อาหารสัตว์น้ำ )</p>
              </div>  
              <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id . '&pond_id=' . $Pond_ID . '&product_id=' . $Product_ID; ?>">
                        

                        <div class="form-group">
                            <label>Feed ID:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="feed_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Pond Name:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="pond_name" value="<?php echo $result_pond_name["pond_name"]; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Product Name:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="product_name" value="<?php echo $result_product_name["product_name"]; ?>" disabled>
                        </div>
                        <div class="form-group">
                          <label>Start Check Time:</label>
                          <input type="text" class="form-control input-default" placeholder="" name="start_check_time" value="<?php echo $result['Start_Check_Time']; ?>" disabled>
                        </div>
                        <div class="form-group" id="endCheckDate">
                            <label>Final Check Time:</label>
                            <div class="form-row">
                              <div class="col">
                                  <input type="date" class="form-control input-default" name="final_check_date" value="">
                              </div>
                              <div class="col">
                                  <input type="time" class="form-control input-default" name="final_check_time" value="00:00">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Average Body Weight (g):</label>
                            <input type="text" class="form-control input-default" placeholder="น้ำหนัก (กรัม)" name="abw" value="<?php echo isset($result['ABW']) ? $result['ABW'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 1:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 1" name="feed_meal1" value="<?php echo (isset($result['Feed_Meal1']) ? $result['Feed_Meal1'] : ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 2:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 2" name="feed_meal2" value="<?php echo isset($result['Feed_Meal2']) ? $result['Feed_Meal2'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 3:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 3" name="feed_meal3" value="<?php echo isset($result['Feed_Meal3']) ? $result['Feed_Meal3'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 4:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 4" name="feed_meal4" value="<?php echo isset($result['Feed_Meal4']) ? $result['Feed_Meal4'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 5:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 5" name="feed_meal5" value="<?php echo isset($result['Feed_Meal5']) ? $result['Feed_Meal5'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Remaining Feed:</label>
                            <input type="number" class="form-control input-default" placeholder="อาหารคงเหลือ" name="remaining_feed" value="<?php echo isset($result['Remaining_Feed']) ? $result['Remaining_Feed'] : ''; ?>">
                        </div>


                        <button type="submit" id="btnEdit" class="btn btn-warning btn-addon" onclick="return confirm('Do you really want to edit?');"><i class="ti-save"></i>Save</button>&nbsp;
                        <button type="button" class="btn btn-default btn-addon" onclick="location.href='feed_list.php'"><i class="ti-control-skip-backward"></i>Go Back</button>     
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
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_target_re_fi8j-y.svg" alt="">  
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

