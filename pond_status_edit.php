
<?php $PageTitle="Edit Pond" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php

      $id = $_GET['id'];
      
      $sql = "SELECT a.`pond_id`, b.`pond_name`, a.`pond_header_id`, a.`start_stocking_date`, a.`end_stocking_date`, a.`revenue`, a.`updated_at` 
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
        
              $end_time = $_POST['end_stocking_time'];
              $end_hour = substr($end_time,0,2);
              $end_minutes = substr($end_time,3,2);

          date_time_set($end_date, $end_hour, $end_minutes);

          $end_date = date_format($end_date, 'Y-m-d H:i:s');
          // echo $end_date





          $sql = "UPDATE `pond` SET 
                  `end_stocking_date`='$end_date',
                  `revenue`='$_POST[revenue]',
                  `updated_at`='$date' WHERE `pond_id` = $id";
          

          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>Edit record successfully</p>";
            $text =  '<b>Your Input:</b>' . 
                    '<ul><li>- Pond ID: ' . $id . 
                    '</li><li>- End Stocking Datetime: ' . $_POST['end_stocking_date'] . 
                    '</li><li>- Revenue: ' . $_POST['revenue'] . 
                    '</li><li>- Updated Date: ' . $date . 
                    '</li></ul>';

            // for refresh new values
            $result['end_stocking_date'] = $_POST['end_stocking_date'];
            $result['revenue'] = $_POST['revenue'];
          }
        } 
      }
      unset($_POST);

  ?>
  
  
      

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPage="Dashboard" ?>
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
                            <label>End Stocking Date:</label>
                            <div class="form-row">
                              <div class="col">
                                  <input type="date" class="form-control input-default" name="end_stocking_date" value="">
                              </div>
                              <div class="col">
                                  <input type="time" class="form-control input-default" name="end_stocking_time" value="00:00">
                              </div>
                            </div>
                        </div>





                        <div class="form-group">
                            <label>Revenue:</label>
                            <input type="number" class="form-control input-default" placeholder="ระบุรายได้" name="revenue">
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

