

<?php $PageTitle="จัดการบ่อเลี้ยง-Pond Management" ?>
<?php include 'layout/header.php';?>
<body>
<?php include 'layout/sidebar.php';?>
<?php include 'layout/headbar.php';?>

<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <?php include 'layout/breadcrumb.php';?>
                
    <!-- content here -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <h2>Enter information regarding book</h2>
                    <ul>
                    <form form-group name="insert" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
                    <li>Book ID:</li><li><input type="text" name="bookid" /></li>
                    <li>Book Name:</li><li><input type="text" name="book_name" /></li>
                    <li>Author:</li><li><input type="text" name="author" /></li>
                    <li>Publisher:</li><li><input type="text" name="publisher" /></li>
                    <li>Date of publication:</li><li><input type="text" name="dop" /></li>
                    <li>Price (USD):</li><li><input type="text" name="price" /></li>
                    <li><input type="submit" /></li>
                    </form>
                    </ul>

                    <?php include 'layout/copyright.php';?>
                </section>
            </div>
        </div>
    </div>

    <?php include 'layout/footer.php';?>
</body>

</html>
<?php
$conn = mysqli_connect('localhost', 'root', '123456789', 'aquaculturde');
$sql = "INSERT INTO pond_header(`user_id`, `pond_name`) VALUES (1,'$_POST[pond_name]');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'];


    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo $name;
    }
  }

?>