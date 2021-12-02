

<?php $PageTitle="Add New Product" ?>
<?php include 'layout/header.php';?>
<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php

      // $_SESSION['user_id'] = 99;

      // define variables
      $result =  $conn->query("SELECT MAX( product_id  ) FROM product;");
      $id = mysqli_fetch_array($result)[0] + 1;
      // var_dump($id);
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
          $sql = "INSERT INTO `product`(`user_id`, `product_name`, `brand`, `pallet_no`, `lot_no`, `unit_price`, `unit_weight`, `remaining_stock`, `updated_at`) 
                  VALUES ( $_SESSION[user_id],'$_POST[product_name]','$_POST[brand]','$_POST[pallet_no]','$_POST[lot_no]','$_POST[unit_price]','$_POST[unit_weight]','$_POST[remaining_stock]', '$date')";
          
          // echo $sql;
          
          if ($conn->query($sql) === TRUE) {
            $success = True;

            $newRecord = "<p>New record created successfully</p>";
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
            $id += 1;
          }
        } 
      }
      unset($_POST);

  ?>
  
  
      

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPageLink="product.php" ?>
      <?php $mainPage='Product Management' ?>
      <?php $activePage=$PageTitle ?>
      <?php include 'layout/breadcrumb.php';?>
                
      <!-- content start here-->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-6">
            <div class="card"> 
              <div class="card-title">
                <h4><?php echo $PageTitle ?></h4>
                <p style="font-size: medium;">( เพิ่มผลิตภัณฑ์อาหารเลี้ยงสัตว์น้ำ )</p>
              </div>  
              <div class="card-body">
                <div class="basic-form"> 
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label>Product ID:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="product_id" value="<?php echo $id; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Product Name:</label><code> * <?php echo $nameErr;?></code>
                            <input type="text" class="form-control input-default" placeholder="ระบุชื่อผลิตภัณฑ์" name="product_name">
                        </div>
                        <div class="form-group">
                            <label>Brand:</label>
                            <input type="text" class="form-control input-default" placeholder="ระบุชื่อทางการค้า" name="brand">
                        </div>
                        <div class="form-group">
                            <label>Pallet Number:</label>
                            <input type="text" class="form-control input-default" placeholder="" name="pallet_no">
                        </div>
                        <div class="form-group">
                            <label>Lot Number:</label>
                            <input type="text" class="form-control input-default" placeholder="ระบุเลข lot" name="lot_no">
                        </div>
                        <div class="form-group">
                            <label>Unit Price:</label>
                            <input type="number" class="form-control input-default" placeholder="ระบุราคา" name="unit_price">
                        </div>
                        <div class="form-group">
                            <label>Unit Weight:</label>
                            <input type="number" class="form-control input-default" placeholder="ระบุน้ำหนัก" name="unit_weight">
                        </div>
                        <div class="form-group">
                            <label>Remaining Stock:</label>
                            <input type="number" class="form-control input-default" placeholder="ระบุจำนวนที่เหลือ" name="remaining_stock">
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
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_art_lover_re_fn8g-b.svg" alt="">  
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

