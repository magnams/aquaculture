<?php
session_start();

include 'setting/dbconnection.php';// Using database connection file here

$id = $_GET['id']; // get id through query string


// sql to delete a record
$sql = "DELETE FROM `product` WHERE `product_id` = '$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  $_SESSION['error_db'] = $conn->error;
}

$conn->close();
header('Location: product.php');

?>