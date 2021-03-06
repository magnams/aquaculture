
<?php $PageTitle="Add New Pond" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php

      // $_SESSION['user_id'] = 99;

      // define variables
      $result =  $conn->query("SELECT MAX( pond_id  ) FROM pond;");
      $id = mysqli_fetch_array($result)[0] + 1;
      // var_dump($id);
      $name = "";
      $idErr = $nameErr = ""; 
      $success = False;
      
      // if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //   $start_date = date_create($_POST['start_stocking_date']);

      //       $start_time = $_POST['start_stocking_time'];
      //       $start_hour = substr($start_time,0,2);
      //       $start_minutes = substr($start_time,3,2);

      //   date_time_set($start_date, $start_hour, $start_minutes);
      //   // echo $start_minutes;
      //   // echo '</br>' . date_format($start_date,"Y-m-d H:i:s");

      // }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["start_stocking_date"])) {
          $nameErr = "Start Stocking Date is required";
        } else {
          $name = $_POST["start_stocking_date"];
        }
      }

      if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if ( (empty($nameErr)) )  {
          $date = date("Y-m-d H:i:s", strtotime('+6 hours'));

          //start_date
          $start_date = date_create($_POST['start_stocking_date']);
        
              // $start_time = $_POST['start_stocking_time'];
              // $start_hour = substr($start_time,0,2);
              // $start_minutes = substr($start_time,3,2);

              $start_hour = $_POST['start_stocking_time'];
              $start_minutes = "00";

          date_time_set($start_date, $start_hour, $start_minutes);

          $start_date = date_format($start_date, 'Y-m-d H:i:s');
          // echo $start_date;
          

          //end_date
          // $end_date = date_create($_POST['end_stocking_date']);
        
          //     $end_time = $_POST['end_stocking_time'];
          //     $end_hour = substr($end_time,0,2);
          //     $end_minutes = substr($end_time,3,2);

          // date_time_set($end_date, $end_hour, $end_minutes);

          // $end_date = date_format($end_date, 'Y-m-d H:i:s');
          // // echo $end_date

          // $_POST['pond_header_id'] = '2';

          $_POST['revenue'] =  !empty($_POST['revenue']) ? $_POST['revenue'] : '0';

          $sql = "INSERT INTO `pond`(`pond_header_id`, `start_stocking_date`, `revenue`, `updated_at`, `status`) 
                  VALUES ('$_POST[pond_header_id]','$start_date','$_POST[revenue]','$date', '$_POST[status]')";
         
          // echo $sql;
          
          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>New record created successfully</p>";
            $text =  '<b>Your Input:</b>' . 
                    '<ul><li>- Pond ID: ' . $id . 
                    '</li><li>- Pond Header ID: ' . $_POST['pond_header_id'] .
                    '</li><li>- Start Stocking Date: ' . $start_date . 
                    // '</li><li>- Revenue: ' . $_POST['revenue'] . 
                    '</li><li>- Status: ' . ($_POST['status'] == 1 ? 'Active' : 'Inactive') . 
                    '</li></ul>';
            $id += 1;
          }
        } 
      }
      unset($_POST);

  ?>
  
  <?php 
  
  $sql = "SELECT DISTINCT `pond_header_id`, `user_id`, `pond_name` FROM `pond_header` WHERE user_id = $_SESSION[user_id];";

  $result = $conn->query($sql);
  
  ?>
      

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPageLink="pond_status.php" ?>
      <?php $mainPage='Pond Status Management' ?>
      <?php $activePage=$PageTitle ?>
      <?php include 'layout/breadcrumb.php';?>
                
      <!-- content start here-->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="card"> 
              <div class="card-title">
                <h4><?php echo $PageTitle ?></h4>
                <p style="font-size: medium;">( ?????????????????????????????????????????????????????? )</p>
              </div>  
              <div class="card-body">
                <div class="basic-form"> 
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label>Pond ID:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="pond_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Pond Name:</label><code> * <?php echo $nameErr;?></code>
                            <!-- <input type="text" class="form-control input-default" placeholder="" name="pond_header_id"> -->
                            <select class="form-control" name="pond_header_id" required>
                                  <option value="">?????????????????????????????????????????????????????????</option>

                                <?php foreach ($result as $value): ?>
                                    <option value="<?php echo $value["pond_header_id"]; ?>">
                                        <?php echo $value["pond_header_id"] . ' : ' . $value["pond_name"]; ?>
                                    </option>
                                <?php endforeach;?>
														</select>
                        </div>
                        <div class="form-group">
                          <label>Start Stocking Date:</label><code> * <?php echo $nameErr;?></code>
                          <div class="form-row">
                              <div class="col">
                                  <input type="date" id="dateStartPicker" class="form-control input-default" name="start_stocking_date" value="">
                              </div>
                              <div class="col">
                                  <!-- <input type="time" class="form-control input-default" name="start_stocking_time" value="00:00"> -->
                                  <select class="form-control input-default" style="height: 42px;" name="start_stocking_time" required>
                                    <!-- <?php for ($x = 0; $x <= 24; $x++) 
                                      {echo '<option value="">' . $x . '</option>';}
                                    ?> -->
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



                        <!-- <div class="checkbox">
                          <label><input type="checkbox" id="chkEndDate"> Input End Stocking Date</label>
                        </div>
                        <div class="form-group" id="endStockingDate" style="display: none;">
                            <label>End Stocking Date:</label>
                            <div class="form-row">
                              <div class="col">
                                  <input type="date" class="form-control input-default" name="end_stocking_date" value="">
                              </div>
                              <div class="col">
                                  <input type="time" class="form-control input-default" name="end_stocking_time" value="00:00">
                              </div>
                            </div>
                        </div> -->


                        <div class="form-group">
                            <label>Status:</label>
                            <select class="form-control" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
														</select>
                        </div>


                        <!-- <div class="form-group">
                            <label>Revenue:</label>
                            <input type="number" class="form-control input-default" placeholder="??????????????????????????????" name="revenue">
                        </div> -->
                        <button type="submit" id="btnSubmit" class="btn btn-primary btn-addon m-b-10 m-l-5"><i class="ti-plus"></i>Insert</button>&nbsp;
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
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_science_re_mnnr-b.svg" alt="">  
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
    // $("#btnSubmit").click(function(){
    //   Swal.fire(
    //     'Good job!',
    //     'You clicked the button!',
    //     'success'
    //   )
    // });
  });


  if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
  }   

</script>
    <?php include 'layout/footer.php';?>
</body>

</html>

