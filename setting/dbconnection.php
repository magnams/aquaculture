<?php


$servername = "localhost";
$username = "root";
$password = "123456789";
$database = 'aquaculture';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>

