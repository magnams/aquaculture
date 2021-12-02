

<?php $PageTitle="Product Management" ?>
<?php include 'layout/header.php';?>

<?php

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login/login.php');
  }
 
?>



<body>
  <?php include 'layout/sidebar.php';?>
  <?php include 'layout/headbar.php';?>
  <?php include 'setting/dbconnection.php';?>
  <?php
  
    $_SESSION['user_id'] = 99;
  
    $sql = "SELECT `product_id`, `user_id`, `product_name`, `brand`, `pallet_no`, `lot_no`, `unit_price`, `unit_weight`, `remaining_stock`, `created_at`, `updated_at` FROM `product` WHERE user_id = $_SESSION[user_id];";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $success = True;
      // output data of each row
      // $row = $result->fetch_assoc();
      // while($row = $result->fetch_assoc()) {
      //   echo "id: " . $row["pond_header_id"]. " - Name: " . $row["pond_name"]. " " . $row["created_at"]. " ". $row["updated_at"]."<br>";
      // }
    } else {
      echo "0 results";
    }
    $conn->close();
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
          <div class="col-lg-12">
            <div class="card">
                <div class="card-title" style="position: relative; margin-bottom: inherit;">
                    <h4><?php echo $PageTitle ?></h4>
                    <span>
                      <button style="position: absolute; right:0" onClick="javascript:window.open('product_add.php', '_blank');" class="btn btn-primary btn-addon m-b-10 m-l-5"> 
                        <i class="ti-plus"></i>Add New Product</button>
                    </span>
                    <p style="font-size: medium;">( รายการผลิตภัณฑ์อาหารเลี้ยงสัตว์น้ำ )</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Pallet Number</th>
                                    <th>Lot Number</th>
                                    <th>Unit Price</th>
                                    <th>Unit Weight</th>
                                    <th>Remaining Stock</th>
                                    <th>Updated Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($result as $value): ?>
                                  <tr>
                                      <td><?php echo $value["product_id"]; ?></td>
                                      <td><span class="badge badge-primary"><?php echo $value["product_name"]; ?></span></td>
                                      <td><?php echo $value["brand"]; ?></td>
                                      <td><?php echo $value["pallet_no"]; ?></td>
                                      <td><?php echo $value["lot_no"]; ?></td>
                                      <td>&#3647; <?php echo $value["unit_price"]; ?></td>
                                      <td><?php echo $value["unit_weight"]; ?></td>
                                      <td class="color-success"><?php echo $value["remaining_stock"]; ?></td>
                                      <td><?php echo $value["updated_at"]; ?></td>
                                      <td>
                                        <a href="product_edit.php?id=<?php echo $value["product_id"]; ?>">
                                          <i class="ti-pencil-alt" style="color: inherit; font-size: large;"></i>
                                        </a>&nbsp;
                                        <a href="product_delete.php?id=<?php echo $value["product_id"]; ?>" onclick="return confirm('Do you really want to delete?');">
                                          <i class="ti-trash" style="color: red; font-size: large;"></i>
                                        </a>
                                      </td>
                                  </tr>                                
                              <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
          <!-- <div class="col-lg-6">
            <div class="card" style="background: inherit;">
              <img style="object-fit: scale-down; object-position: 50% 20%;" src="assets\images\new\undraw_explore_re_8l4v_b.svg" alt="">  
            </div>
          </div> -->
        </div>


      
        <?php include 'layout/copyright.php';?>
      </section>
      <!-- content end-->






    </div>
  </div>
</div>
<script>

</script>
    <?php include 'layout/footer.php';?>
</body>

</html>

