<?php

include 'setting/dbconnection.php';// Using database connection file here

$id = $_GET['id']; // get id through query string


// sql to delete a record
$sql = "DELETE FROM `pond` WHERE `pond_id` = '$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
header('Location: pond_status.php');

?>