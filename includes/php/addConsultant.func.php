<?php

require_once('MysqliConnect.php');

function addConsultant($args = array()){
	
	$connect = new MysqliConnect();
	$db = $connect->dbConnect();
		
	$query = "INSERT INTO persons (firstname, surname, language_id) VALUES (?,?,?)";
	$stmt = $db->prepare($query);
	$stmt->bind_param('ssi',$args[0],$args[1],$args[2]);
	$result = $stmt->execute();
	if($result) {
		return true;
	}
	return false;
}


