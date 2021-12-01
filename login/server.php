<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
//DB
// $servername = "localhost";
// $username_server = "root";
// $password = "";
// $dbname = "Aqua";
include '../setting/dbconnection.php';


// connect to the database
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if($db ->connect_error){
  die("Connection failed: " . $db->connect_error);
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $Firstname = mysqli_real_escape_string ($db, $_POST['Firstname']);
  $Lastname = mysqli_real_escape_string ($db, $_POST['Lastname']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "กรุณาระบุ Username"); }
  if (empty($email)) { array_push($errors, "กรุณาระบุ Email"); }
  if (empty($password_1)) { array_push($errors, "กรุณาระบุ Password"); }
  if ($password_1 != $password_2) {
	array_push($errors, "passwords ทั้งสองไม่ตรงกัน");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username นี้มีในระบบเรียบร้อยแล้ว");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email นี้มีในระบบเรียบร้อยแล้ว");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, email, Firstname, Lastname, password) 
  			  VALUES ('$username', '$email', '$Firstname', '$Lastname', '$password')";
  	mysqli_query($db, $query);


    $result2 =  $conn->query("SELECT * FROM user WHERE username='$username' LIMIT 1;")->fetch_assoc();

    
  	$_SESSION['username'] = $username;
    $_SESSION['Firstname'] = $result2['Firstname'];
    $_SESSION['Lastname'] = $result2['Lastname'];
    $_SESSION['user_id'] = $result2['user_id'];
    $_SESSION['email'] = $result2['email'];

  	$_SESSION['success'] = "คุณได้เข้าสู่ระบบเรียบร้อยแล้ว";
  	// header('location: index.php');
    header('location: ../pond_header.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "กรุณาระบุ Username");
  }
  if (empty($password)) {
  	array_push($errors, "กรุณาระบุ Password");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);

    $result2 =  $conn->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1;")->fetch_assoc();

  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['Firstname'] = $result2['Firstname'];
      $_SESSION['Lastname'] = $result2['Lastname'];
      $_SESSION['user_id'] = $result2['user_id'];
      $_SESSION['email'] = $result2['email'];
      
  	  $_SESSION['success'] = "คุณได้เข้าสู่ระบบเรียบร้อยแล้ว";
  	  // header('location: index.php');
  	  header('location: ../pond_header.php');
  	}else {
  		array_push($errors, "Username หรือ password ไม่ถูกต้อง");
  	}
  }
}

?>