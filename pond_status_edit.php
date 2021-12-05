
<?php $PageTitle="Edit Pond" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php

      $id = $_GET['id'];
      
      $sql = "SELECT a.`pond_id`, b.`pond_name`, a.`pond_header_id`, a.`start_stocking_date`, a.`end_stocking_date`, a.`revenue`, a.`updated_at`, a.`status` 
              FROM `pond` a
              INNER JOIN `pond_header` b on a.pond_header_id = b.pond_header_id
              WHERE a.`pond_id` = $id LIMIT 1;";
      
      $result =  $conn->query($sql)->fetch_assoc();
      

      $name = "";
      $idErr = $nameErr = ""; 
      $success = False;
      
      // if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //   if (empty($_POST["start_stocking_date"])) {
      //     $nameErr = "Start Stocking Date is required";
      //   } else {
      //     $name = $_POST["start_stocking_date"];
      //   }
      // }

      if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if ( (empty($nameErr)) )  {
          $date = date("Y-m-d H:i:s", strtotime('+6 hours'));

          //end_date
          $end_date = date_create($_POST['end_stocking_date']);
        
              // $end_time = $_POST['end_stocking_time'];
              // $end_hour = substr($end_time,0,2);
              // $end_minutes = substr($end_time,3,2);

              $end_hour = $_POST['end_stocking_time'];
              $end_minutes = '00';

          date_time_set($end_date, $end_hour, $end_minutes);

          $end_date = date_format($end_date, 'Y-m-d H:i:s');
          // echo $end_date


          $_POST['revenue'] =  !empty($_POST['revenue']) ? $_POST['revenue'] : '0';


          $sql = "UPDATE `pond` SET 
                  `end_stocking_date`='$end_date',
                  `revenue`='$_POST[revenue]',
                  `status`='$_POST[status]',
                  `updated_at`='$date' WHERE `pond_id` = $id";
          
          
          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>Edit record successfully</p>";
            $text =  '<b>Your Input:</b>' . 
                    '<ul><li>- Pond ID: ' . $id . 
                    '</li><li>- End Stocking Datetime: ' . $end_date .
                    '</li><li>- Revenue: ' . $_POST['revenue'] . 
                    '</li><li>- Status: ' . ($_POST['status'] == 1 ? 'Active' : 'Inactive') . 
                    '</li><li>- Updated Date: ' . $date . 
                    '</li></ul>';

            // for refresh new values
            $result['end_stocking_date'] = $end_date;
            // $result['end_stocking_time'] = date('H:i',strtotime($_POST["end_stocking_date"]));
            $result['revenue'] = $_POST['revenue'];
            $result['status'] = ($_POST['status'] == 1 ? 'Active' : 'Inactive');
            // echo $result['end_stocking_time'];
          }
        } 
      }
      unset($_POST);

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
                <p style="font-size: medium;">( แก้ไขรายละเอียดบ่อเลี้ยง )</p>
              </div>  
              <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
                        

                    <div class="form-group">
                            <label>Pond ID:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="pond_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Pond Name:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="pond_header_name" value="<?php echo $result['pond_name']; ?>" disabled>
                        </div>
                        <div class="form-group">
                          <label>Start Stocking Date:</label>
                          <input type="text" class="form-control input-default" placeholder="" name="start_stocking_date" value="<?php echo $result['start_stocking_date']; ?>" disabled>
                        </div>



                       
                        <div class="form-group" id="endStockingDate">
                            <label>Pond End Date:</label>
                            <div class="form-row">
                              <div class="col">
                                  <input type="date" class="form-control input-default" name="end_stocking_date" value="<?php echo isset($result["end_stocking_date"]) ? date('Y-m-d',strtotime($result["end_stocking_date"])) : '' ?>">
                              </div>
                              <div class="col">
                                  <!-- <input type="time" class="form-control input-default" name="end_stocking_time" value="<?php echo date('H:i',strtotime($result["end_stocking_date"])) ?>"> -->
                                  <select class="form-control input-default" style="height: 42px;" name="end_stocking_time" required>
                                    
                                    <option value="<?php echo date('H',strtotime($result["end_stocking_date"])) ?>"><?php echo date('H:i',strtotime($result["end_stocking_date"])) ?> (selected)</option>
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


                        <div class="form-group">
                            <label>Status:</label>
                            <select class="form-control" name="status">
                            <?php if( $result['status'] == 1 ) : ?>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>

                            <?php else : ?> 
                                <option value="1">Active</option>
                                <option value="0" selected>Inactive</option>
                            <?php endif; ?>

														</select>
                        </div>


                        <div class="form-group">
                            <label>Revenue:</label>
                            <input type="number" class="form-control input-default" placeholder="ระบุรายได้บ่อเลี้ยง (บาท)" name="revenue" value="<?php echo isset($result['revenue']) ? $result['revenue'] : '0'; ?>">
                        </div>


                        <button type="submit" id="btnEdit" class="btn btn-warning btn-addon" onclick="return confirm('Do you really want to edit?');"><i class="ti-save"></i>Save</button>&nbsp;
                        <button type="button" class="btn btn-default btn-addon" onclick="location.href='pond_status.php'"><i class="ti-control-skip-backward"></i>Go Back</button>     
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
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_science_re_mnnr-y.svg" alt="">  
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

