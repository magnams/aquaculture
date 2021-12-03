
<?php include '../setting/dbconnection.php';?>
<?php 
	session_start();

	$sql_user = "SELECT * FROM user WHERE user_id = $_SESSION[user_id]";
	$result_user = $conn->query($sql_user)->fetch_assoc();

	// connect to the database
	$db = new mysqli($servername, $username, $password, $database);

	// Check connection
	if($db ->connect_error){
		die("Connection failed: " . $db->connect_error);
	}

	if (isset($_POST['profile_user'])) {
		// receive all input values from the form
		$Firstname = $_POST['Firstname'];
		$Lastname = $_POST['Lastname'];
		$user_number = mysqli_real_escape_string($db, $_POST['user_number']);


		$sql = "UPDATE `user` SET `Firstname`='$Firstname',`Lastname`='$Lastname',`user_number`='$user_number' WHERE user_id = $_SESSION[user_id]";
		// echo $sql;
	
		if ($conn->query($sql) === TRUE) {
            $success = True;

			// for refresh new values
			$result_user['Firstname'] = $Firstname;
			$result_user['Lastname'] = $Lastname;
			$result_user['user_number'] = $user_number;

			$_SESSION['Firstname'] = $Firstname;
			$_SESSION['Lastname'] = $Lastname;
			$_SESSION['user_number'] = $user_number;

			
		}
		// header('location: ../feed_list.php');
	}
?>




<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>แก้ไขข้อมูลส่วนตัว</h2>
  </div>
	
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
  	<div class="input-group">
  	  <label for ='username'>Username</label>
  	  <input type="text" name="username" value="<?php echo $result_user["username"]; ?>" disabled>
  	</div>
	<div class="input-group">
  	  <label for ='email'>Email</label>
  	  <input type="text" name="email" value="<?php echo $result_user["email"]; ?>" disabled>
  	</div>
	<div class="input-group">
  	  <label for ='Firstname'>ชื่อ</label>
  	  <input type="text" name="Firstname" value="<?php echo isset($result_user['Firstname']) ? $result_user['Firstname'] : ''; ?>">
  	</div>
	<div class="input-group">
  	  <label for ='Lastname'>นามสกุล</label>
  	  <input type="text" name="Lastname" value="<?php echo isset($result_user['Lastname']) ? $result_user['Lastname'] : ''; ?>">
  	</div>
	<div class="input-group">
  	  <label for ='user_number'>หมายเลขประจำตัว</label>
  	  <input type="text" name="user_number" value="<?php echo isset($result_user['user_number']) ? $result_user['user_number'] : ''; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="profile_user" onclick="return confirm('Do you really want to edit?');">บันทึก</button>
  	</div>
  	<p>
  		ยืนยันข้อมูลถูกต้อง? <a href="../feed_list.php">กลับเข้าสู่หน้าหลัก</a>
  	</p>
  </form>
</body>
</html>