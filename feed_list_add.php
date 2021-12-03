

<?php $PageTitle="Add New Feed" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php

      // $_SESSION['user_id'] = 99;

      // define variables
      $result =  $conn->query("SELECT MAX( feed_id  ) FROM feed_list;");
      $id = mysqli_fetch_array($result)[0] + 1;
      // var_dump($id);
      $name = "";
      $idErr = $nameErr = ""; 
      $success = False;
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["start_check_date"])) {
          $nameErr = "Start Check Date is required";
        } else {
          $name = $_POST["start_check_date"];
        }
      }

      if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if ( (empty($nameErr)) )  {
          $date = date("Y-m-d H:i:s", strtotime('+6 hours'));

          //start_date
          $start_date = date_create($_POST['start_check_date']);
        
              // $start_time = $_POST['start_check_time'];
              // $start_hour = substr($start_time,0,2);
              // $start_minutes = substr($start_time,3,2);

              $start_hour = $_POST['start_check_time'];
              $start_minutes = '00';

          date_time_set($start_date, $start_hour, $start_minutes);

          $start_date = date_format($start_date, 'Y-m-d H:i:s');

         

          $sql = "INSERT INTO `feed_list`(`Pond_ID`, `Product_ID`, `Start_Check_Time`, `ABW`, `Feed_Meal1`, `Feed_Meal2`, `Feed_Meal3`, `updated_at`) 
                  VALUES ('$_POST[pond_name]','$_POST[product_name]','$start_date','$_POST[abw]','$_POST[feed_meal1]','$_POST[feed_meal2]','$_POST[feed_meal3]', '$date')";
         


          // echo $sql;
          
          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>New record created successfully</p>";
            $text =  '<b>Your Input:</b>' . 
                    '<ul><li>- Feed ID: ' . $id . 
                    '</li><li>- Pond ID: ' . $_POST['pond_name'] .
                    '</li><li>- Product ID: ' . $_POST['product_name'] .
                    '</li><li>- Start Check Time: ' . $start_date . 
                    '</li><li>- ABW: ' . $_POST['abw'] . 
                    '</li><li>- Feed Meal 1: ' . $_POST['feed_meal1'] . 
                    '</li><li>- Feed Meal 2: ' . $_POST['feed_meal2'] . 
                    '</li><li>- Feed Meal 3: ' . $_POST['feed_meal3'] . 
                    '</li></ul>';
            $id += 1;
          }
        } 
      }
      unset($_POST);

  ?>
  
  <?php 
  
  $sql_pond_name = "SELECT DISTINCT a.`pond_header_id`, a.`user_id`, a.`pond_name`, b.`pond_id`
                    FROM `pond_header` a 
                    INNER JOIN `pond` b on a.`pond_header_id` = b.`pond_header_id`
                    WHERE a.user_id = $_SESSION[user_id]
                    AND b.`status` = '1';";

  $result_pond_name = $conn->query($sql_pond_name);


  $sql_product_name = "SELECT * FROM product WHERE user_id = $_SESSION[user_id];";

  $result_product_name = $conn->query($sql_product_name);
  
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
                <p style="font-size: medium;">( เพิ่มข้อมูลการให้อาหารสัตว์น้ำใหม่ )</p>
              </div>  
              <div class="card-body">
                <div class="basic-form"> 
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label>Feed ID:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="feed_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Pond Name:</label><code> * </code>
                            <select class="form-control" name="pond_name" required>
                                  <option value="">กรุณาเลือกบ่อเลี้ยง</option>
                                <?php foreach ($result_pond_name as $value): ?>
                                    <option value="<?php echo $value["pond_id"]; ?>">
                                        <?php echo $value["pond_id"] . ' : ' . $value["pond_name"]; ?>
                                    </option>
                                <?php endforeach;?>
														</select>
                        </div>
                        <div class="form-group">
                            <label>Product Name:</label><code> * </code>
                            <select class="form-control" name="product_name" required>
                                  <option value="">กรุณาเลือกอาหารเลี้ยง</option>
                                <?php foreach ($result_product_name as $value): ?>
                                    <option value="<?php echo $value["product_id"]; ?>">
                                        <?php echo $value["product_id"] . ' : ' . $value["product_name"]; ?>
                                    </option>
                                <?php endforeach;?>
														</select>
                        </div>
                        <div class="form-group">
                          <label>Start Check Time:</label><code> * <?php echo $nameErr;?></code>
                          <div class="form-row">
                              <div class="col">
                                  <input type="date" id="dateStartPicker" class="form-control input-default" name="start_check_date" value="">
                              </div>
                              <div class="col">
                                  <!-- <input type="time" class="form-control input-default" name="start_check_time" value="00:00"> -->
                                  <select class="form-control input-default" style="height: 42px;" name="start_check_time" required>
                                   
                                    <option value="00">00:00</option>
                                    <option value="01">01:00</option>
                                    <option value="02">02:00</option>
                                    <option value="03">03:00</option>
                                    <option value="04">04:00</option>
                                    <option value="05">05:00</option>
                                    <option value="06">06:00</option>
                                    <option value="07">07:00</option>
                                    <option value="08">08:00</option>
                                    <option value="09">09:00</option>
                                    <option value="10">10:00</option>
                                    <option value="11">11:00</option>
                                    <option value="12">12:00</option>
                                    <option value="13">13:00</option>
                                    <option value="14">14:00</option>
                                    <option value="15">15:00</option>
                                    <option value="16">16:00</option>
                                    <option value="17">17:00</option>
                                    <option value="18">18:00</option>
                                    <option value="19">19:00</option>
                                    <option value="20">20:00</option>
                                    <option value="21">21:00</option>
                                    <option value="22">22:00</option>
                                    <option value="23">23:00</option>
                                  </select>
                              </div>
                          </div>
                        </div>          
                        <!-- <div class="form-group">
                          <label>Final Check Time:</label>
                          <div class="form-row">
                              <div class="col">
                                  <input type="date" id="dateEndPicker" class="form-control input-default" name="start_end_date" value="">
                              </div>
                              <div class="col">
                                  <input type="time" class="form-control input-default" name="start_end_time" value="00:00">
                              </div>
                          </div>
                        </div>   -->
                        <div class="form-group">
                            <label>ABW:</label>
                            <input type="text" class="form-control input-default" placeholder="จำไม่ได้ถามนิน" name="abw">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 1:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 1" name="feed_meal1">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 2:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 2" name="feed_meal2">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 3:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 3" name="feed_meal3">
                        </div>
                        <!-- <div class="form-group">
                            <label>Feed Meal 4:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 4" name="feed_meal4">
                        </div>
                        <div class="form-group">
                            <label>Feed Meal 5:</label>
                            <input type="number" class="form-control input-default" placeholder="ให้อาหารครั้งที่ 5" name="feed_meal5">
                        </div>
                        <div class="form-group">
                            <label>Remaining Feed:</label>
                            <input type="number" class="form-control input-default" placeholder="อาหารคงเหลือ" name="remaining_feed">
                        </div> -->
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
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_target_re_fi8j-b.svg" alt="">  
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

  Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
  });

  $('#dateStartPicker').val(new Date().toDateInputValue());


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

