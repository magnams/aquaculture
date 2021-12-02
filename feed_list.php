

<?php $PageTitle="Feed Records" ?>
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
  
    // $_SESSION['user_id'] = 99; , p.`product_name`, p.`brand`
  
    $sql = "SELECT c.`Feed_ID`, c.`Pond_ID`, c.`Product_ID`, c.`Start_Check_Time`, c.`Final_Check_Time`, c.`ABW`, c.`Feed_Meal1`, c.`Feed_Meal2`, c.`Feed_Meal3`, c.`Feed_Meal4`, c.`Feed_Meal5`, c.`Remaining_Feed`, c.`created_at`, c.`updated_at`,
            b.`pond_name`
            FROM `feed_list` c
            INNER JOIN (SELECT * FROM `pond` WHERE `end_stocking_date` ='' or `end_stocking_date` is null) a on c.pond_id = a.pond_id
            INNER JOIN `pond_header` b on a.pond_header_id = b.pond_header_id
            WHERE b.user_id = $_SESSION[user_id];";

    $result = $conn->query($sql);
    // echo $result->num_rows;

    if ($result->num_rows > 0) {
      $success = True;
    

    } else {
      echo "0 results";
    }

    //select product name
    $product = mysqli_query($conn, "SELECT * FROM product WHERE user_id = $_SESSION[user_id];");
    $product_array = array();
    while ($row = mysqli_fetch_assoc($product)) {
        $product_array[$row['product_id']] = $row['product_name'];
    }

    // print_r($product_array);
    // echo '<br>' . $product_array[1];

    $conn->close();
  ?>

 

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPageLink="feed_list.php" ?>
      <?php $mainPage=$PageTitle ?>
      <?php $activePage='' ?>
      <?php include 'layout/breadcrumb.php';?>
                
      <!-- content start here-->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-title" style="position: relative; margin-bottom: inherit;">
                    <h4><?php echo $PageTitle ?></h4>
                    <span>
                      <button style="position: absolute; right:0" onclick="location.href='feed_list_add.php'" class="btn btn-primary btn-addon m-b-10 m-l-5"> 
                        <i class="ti-plus"></i>Add New Feed</button>
                    </span>
                    <p style="font-size: medium;">( ตารางบันทึกข้อมูลการให้อาหารสัตว์น้ำ )</p>
                </div>
                <div class="card-body">
                  <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                          <table id="bootstrap-data-table-export" class="display table table-borderd table-hover">
                              <thead>
                                  <tr>
                                    <th>Pond Name</th>
                                    <th>Product Name</th>
                                    <th>Start Check Time</th>
                                    <th>Final Check Time</th>
                                    <th>ABW</th>
                                    <th>Feed Meal 1</th>
                                    <th>Feed Meal 2</th>
                                    <th>Feed Meal 3</th>
                                    <th>Feed Meal 4</th>
                                    <th>Feed Meal 5</th>
                                    <th>Remaining Feed</th>
                                    <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($result as $value): ?>
                                    <tr>
                                        <td><?php echo isset($value["pond_name"]) ? $value["pond_name"] : ''; ?></td>
                                        <td><?php echo $product_array[$value["Product_ID"]]; ?></td>
                                        <td><?php echo isset($value["Start_Check_Time"]) ? $value["Start_Check_Time"] : ''; ?></td>
                                        <td><?php echo isset($value["Final_Check_Time"]) ? $value["Final_Check_Time"] : ''; ?></td>
                                        <td><?php echo isset($value["ABW"]) ? $value["ABW"] : ''; ?></td>
                                        <td><?php echo isset($value["Feed_Meal1"]) ? $value["Feed_Meal1"] : ''; ?></td>
                                        <td><?php echo isset($value["Feed_Meal2"]) ? $value["Feed_Meal2"] : ''; ?></td>
                                        <td><?php echo isset($value["Feed_Meal3"]) ? $value["Feed_Meal3"] : ''; ?></td>
                                        <td><?php echo isset($value["Feed_Meal4"]) ? $value["Feed_Meal4"] : ''; ?></td>
                                        <td><?php echo isset($value["Feed_Meal5"]) ? $value["Feed_Meal5"] : ''; ?></td>
                                        <td><?php echo isset($value["Remaining_Feed"]) ? $value["Remaining_Feed"] : ''; ?></td>
                                        


                                        <td>
                                          <a href="feed_list_edit.php?id=<?php echo $value["Feed_ID"]; ?>&pond_id=<?php echo $value["Pond_ID"]; ?>&product_id=<?php echo $value["Product_ID"]; ?>">
                                            <i class="ti-pencil-alt" style="color: inherit; font-size: large;"></i>
                                          </a>&nbsp;
                                          <a href="feed_list_delete.php?id=<?php echo $value["Feed_ID"]; ?>" onclick="return confirm('Do you really want to delete?');">
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
          </div>
        </div>


      
        <?php include 'layout/copyright.php';?>
      </section>
      <!-- content end-->






    </div>
  </div>
</div>
<script>
    // $(document).ready(function () {
    //   $('#table_id').DataTable();
    //   $('.dataTables_length').addClass('bs-select');
    // });
</script>
    <?php include 'layout/footer.php';?>




 
    
    <!-- scripit init-->
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    

</body>

</html>

