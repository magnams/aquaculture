


<?php $PageTitle="Pond Status Management" ?>
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
  
    // $_SESSION['user_id'] = 99;
  
    $sql = "SELECT a.`pond_id`, b.`pond_name`, a.`pond_header_id`, a.`start_stocking_date`, a.`end_stocking_date`, a.`revenue`, a.`updated_at`,  a.`status`
            FROM `pond` a
            INNER JOIN `pond_header` b on a.pond_header_id = b.pond_header_id
            WHERE b.user_id = $_SESSION[user_id];";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $success = True;
      

    } else {
      echo "0 results";
    }
    $conn->close();
  ?>

 

      


<div class="content-wrap">
  <div class="main">
    <div class="container-fluid">
      <?php $mainPageLink="pond_status.php" ?>
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
                      <button style="position: absolute; right:0" onclick="location.href='pond_status_add.php'" class="btn btn-primary btn-addon m-b-10 m-l-5"> 
                        <i class="ti-plus"></i>Add New Pond</button>
                    </span>
                    <p style="font-size: medium;">( รายการสถานะบ่อเลี้ยง )</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dtBasicExample">
                            <thead>
                                <tr>
                                    <th>Pond ID</th>
                                    <th>Pond Name</th>
                                    <th>Start Stocking Date</th>
                                    <th>Pond End Date</th>
                                    <th>Age (Days)</th>
                                    <th>Revenue</th>
                                    <!-- <th>Updated Date</th> -->
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($result as $value): ?>
                                  <tr>
                                      <td><?php echo $value["pond_id"]; ?></td>
                                      <td><?php echo $value["pond_name"]; ?></td>
                                      <td><?php echo $value["start_stocking_date"]; ?></td>
                                      <td><?php echo $value["end_stocking_date"]; ?></td>
                                      <td class="">
                                        <?php
                                          $earlier = strtotime($value["start_stocking_date"]);
                                          
                                          $later = isset($value["end_stocking_date"]) ? strtotime($value["end_stocking_date"]) : time();
                                          
                                          $abs_diff = $later - $earlier;

                                          echo round($abs_diff / (60 * 60 * 24));

                                        ?>
                                       
                                      </td>
                                      <td class="color-success"><?php echo $value["revenue"]; ?></td>
                                      <!-- <td><?php echo $value["updated_at"]; ?></td> -->
                                      
                                      <!-- <td>
                                        <?php if( (isset($value["end_stocking_date"]) ? $value["end_stocking_date"] : date("Y-m-d H:i:s", strtotime('+6 hours')) ) >= date("Y-m-d H:i:s", strtotime('+6 hours'))  ) : ?> 
                                          <span class="badge badge-primary">active</span>
                                          
                                        <?php else : ?> 
                                            <span class="badge badge-danger">Inactive</span>

                                        <?php endif; ?>
                                      </td> -->

                                      <td>
                                        <?php if( $value["status"] == 1) : ?> 
                                          <span class="badge badge-primary">active</span>
                                          
                                        <?php else : ?> 
                                            <span class="badge badge-danger">Inactive</span>

                                        <?php endif; ?>
                                      </td>
                                      
                                      <td>
                                        <a href="pond_status_edit.php?id=<?php echo $value["pond_id"]; ?>">
                                          <i class="ti-pencil-alt" style="color: inherit; font-size: large;"></i>
                                        </a>&nbsp;
                                        <!-- <a href="pond_status_delete.php?id=<?php echo $value["pond_id"]; ?>" id="delete" onclick="return confirm('Do you really want to delete?');"> -->
                                        <a href="#" onclick="delFunction(<?php echo $value['pond_id']; ?>)" >
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


      
        <?php include 'layout/copyright.php';?>
      </section>
      <!-- content end-->






    </div>
  </div>
</div>

    <?php include 'layout/footer.php';?>

    
<script type="text/javascript">
  

  function delFunction(id){
      Swal.fire({
        title: 'Are you sure?',
        text: "Delete Pond ID: " + id + " !!!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          
          // var categoryId = $("#deleteIcon").attr('data-categoryid');
          // console.log(id);
          document.location = "pond_status_delete.php?id=" + id;
          
        }
      })
    };
    
  </script>

<script>
  
      function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    <?php foreach ($result as $value): ?>

      console.log(numberWithCommas(<?php echo $value["revenue"]; ?>));

    <?php endforeach;?>

    var myprice = '';
    for(i = 0; i < myprice.length; i++)
        {

            //Remove Leading Zero
            // myquantity[i].value = myquantity[i].value.toString().replace(/^0+/, "");
           
            // //Force Min Quantity to 1
            // if (myquantity[i].value <= 0) {
            //     myquantity[i].value = 1;
            // }
 
            // //Cal Total Price
            // productprice[i].innerText = ((parseFloat((myprice[i].value.toString().replace(/,/g, "")))) * (myquantity[i].value)).toLocaleString("en-US");            
            // gt=gt + (parseFloat((myprice[i].value.toString().replace(/,/g, "")))) * (myquantity[i].value);
            // sumqtycal=sumqtycal + parseInt(myquantity[i].value);
        }


</script>
</body>

</html>

