
<?php include '../setting/dbconnection.php';?>
<?php 
	session_start();


	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
 

	$sql_user = "SELECT * FROM user WHERE user_id = $_SESSION[user_id]";
	$result_user = $conn->query($sql_user)->fetch_assoc();

	// connect to the database
	$db = new mysqli($servername, $username, $password, $database);

	// Check connection
	if($db ->connect_error){
		die("Connection failed: " . $db->connect_error);
	}

	// if (isset($_POST['profile_user'])) {
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Firstname'])){
		// receive all input values from the form
		$Firstname = mysqli_real_escape_string($db, $_POST['Firstname']);
		$Lastname = mysqli_real_escape_string($db, $_POST['Lastname']);
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

  <!-- SweetAlert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="icon" type="image/x-icon" href="../assets/images/new/shrimp16.png">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

</head>
<body>
  <div class="header">
  	<h2>Edit Profile</h2>
  </div>
	
  <form id="myFormRegister" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
  	<div class="input-group">
  	  <label for ='username'>Username</label>
  	  <input type="text" name="username" value="<?php echo $result_user["username"]; ?>" disabled>
  	</div>
	<div class="input-group">
  	  <label for ='email'>Email</label>
  	  <input type="text" name="email" value="<?php echo $result_user["email"]; ?>" disabled>
  	</div>
	<div class="input-group">
  	  <label for ='Firstname'>Firstname</label>
  	  <input type="text" name="Firstname" value="<?php echo isset($result_user['Firstname']) ? $result_user['Firstname'] : ''; ?>" placeholder="ชื่อ">
  	</div>
	<div class="input-group">
  	  <label for ='Lastname'>Lastname</label>
  	  <input type="text" name="Lastname" value="<?php echo isset($result_user['Lastname']) ? $result_user['Lastname'] : ''; ?>" placeholder="นามสกุล">
  	</div>
	<div class="input-group">
  	  <label for ='user_number'>User Number</label>
  	  <input type="text" name="user_number" value="<?php echo isset($result_user['user_number']) ? $result_user['user_number'] : ''; ?>" placeholder="หมายเลขประจำตัว">
  	</div>
  	<div class="input-group">
  	  <!-- <button type="submit" class="btn btn-w100" name="profile_user" onclick="return confirm('Do you really want to edit?');">บันทึก</button> -->
  	  <button type="button" class="btn btn-w100" name="profile_user" onclick="submitFunction()" style="cursor: pointer">Save</button>
  	</div>
  	<p>
  		ยืนยันข้อมูลถูกต้อง? <a href="../feed_list.php"> Back to Feed List</a>
  	</p>
	  <!-- <?php  echo md5('1234') ?> -->
  </form>




  <script>
    

    function submitFunction(){
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to edit?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
          
			document.getElementById("myFormRegister").submit();
			
			
        }
      })
    };

	function successAlert(){
		Swal.fire({
			icon: 'success',
			title: 'Your data has been saved',
			showConfirmButton: false,
			timer: 1500
			})
	}

	

	//Prevent Resubmission
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
  	} 

</script>
<?php
	if (isset($success)){
  		if ($success === True) {
            
			echo "<script> successAlert(); </script>"; 
	}}
?>
<!-- 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>