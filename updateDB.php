<?php
include "config/config.php";
include "api/includes/MysqliConnect.php";

$db = new MysqliConnect;
$conn = $db->dbConnect();

// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

// sql query with CREATE DATABASE
$sql = file_get_contents("sql/nrtwo.sql");

// Performs the $sql query on the server to create the database
if ($conn->multi_query($sql) === TRUE) {
  echo 'Database successfully created';
}
else {
 echo 'Error: '. $conn->error;
}

$conn->close();
?>

