<?php
include "includes/php/MysqliConnect.php";
$db = new MysqliConnect;

$db->dbConnect();

$query = file_get_contents("sql/NrTwo.sql");
if (!$db->query($query)){
	echo "not working";
}
$db->close();
//$stmt = $mysqli->prepare($query);
#$stmt->execute();
