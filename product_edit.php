
<?php $PageTitle="Edit Product" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php

      $id = $_GET['id'];
      
      
      $result =  $conn->query("SELECT * FROM `product` WHERE `product_id` = $id LIMIT 1;")->fetch_assoc();
      

      $name = "";
      $idErr = $nameErr = ""; 
      $success = False;
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["product_name"])) {
          $nameErr = "Product Name is required";
        } else {
          $name = $_POST["product_name"];
        }
      }

      if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if ( (empty($nameErr)) )  {
          $date = date("Y-m-d H:i:s", strtotime('+6 hours'));
          $sql = "UPDATE `product` SET 
                  `product_name`='$_POST[product_name]',
                  `brand`='$_POST[brand]',
                  `pallet_no`='$_POST[pallet_no]',
                  `lot_no`='$_POST[lot_no]',
                  `unit_price`='$_POST[unit_price]',
                  `unit_weight`='$_POST[unit_weight]',
                  `remaining_stock`='$_POST[remaining_stock]',          
                  `updated_at`='$date' WHERE `product_id` = $id";
          

          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>Edit record successfully</p>";
            $text =  '<b>Your Input:</b>' . 
                    '<ul><li>- Product ID: ' . $id . 
                    '</li><li>- Product Name: ' . $name . 
                    '</li><li>- Brand: ' . $_POST['brand'] . 
                    '</li><li>- Pallet Number: ' . $_POST['pallet_no'] . 
                    '</li><li>- Lot Number: ' . $_POST['lot_no'] . 
                    '</li><li>- Unit Price: ' . $_POST['unit_price'] . 
                    '</li><li>- Unit Weight: ' . $_POST['unit_weight'] . 
                    '</li><li>- Remianing Stock: ' . $_POST['remaining_stock'] . 
                    '</li></ul>';

            // for refresh new values
            $result['product_name'] = $_POST['product_name'];
            $result['brand'] = $_POST['brand'];
            $result['pallet_no'] = $_POST['pallet_no'];
            $result['lot_no'] = $_POST['lot_no'];
            $result['unit_price'] = $_POST['unit_price'];
            $result['unit_weight'] = $_POST['unit_weight'];
            $result['remaining_stock'] = $_POST['remaining_stock'];
            
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
                <p style="font-size: medium;">( แก้ไขชื่อผลิตภัณฑ์ )</p>
              </div>  
              <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
                        

                        <div class="form-group">
                            <label>Product ID:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="product_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Product Name:</label><code> * <?php echo $nameErr;?></code>
                            <input type="text" class="form-control input-default" placeholder="ระบุชื่อผลิตภัณฑ์" name="product_name" value="<?php echo $result['product_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Brand:</label>
                            <input type="text" class="form-control input-default" placeholder="ระบุชื่อทางการค้า" name="brand" value="<?php echo $result['brand']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Pallet Number:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="pallet_no" value="<?php echo $result['pallet_no']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Lot Number:</label>
                            <input type="text" class="form-control input-default" placeholder="ระบุเลข lot" name="lot_no" value="<?php echo $result['lot_no']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Unit Price:</label>
                            <input type="number" class="form-control input-default" placeholder="ระบุราคา" name="unit_price" value="<?php echo $result['unit_price']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Unit Weight:</label>
                            <input type="number" class="form-control input-default" placeholder="ระบุน้ำหนัก" name="unit_weight" value="<?php echo $result['unit_weight']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Remaining Stock:</label>
                            <input type="number" class="form-control input-default" placeholder="ระบุจำนวนที่เหลือ" name="remaining_stock" value="<?php echo $result['remaining_stock']; ?>">
                        </div>


                        <button type="submit" id="btnEdit" class="btn btn-warning btn-addon" onclick="return confirm('Do you really want to edit?');"><i class="ti-save"></i>Save</button>&nbsp;
                        <button type="button" class="btn btn-default btn-addon" onclick="location.href='product.php'"><i class="ti-control-skip-backward"></i>Go Back</button>     
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
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_art_lover_re_fn8g-y.svg" alt="">  
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

