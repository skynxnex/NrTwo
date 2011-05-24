<?php

require_once('MysqliConnect.php');

function addConsultant($args = array()){
	
	$connect = new MysqliConnect();
	$db = $connect->dbConnect();
	//hämta dbuppkoppling?
	//hämta värdena ur arrayen
	//bygg query
	//skicka query
	//return sucess eller fail	
		
		$query = "INSERT INTO persons (firstname, surname, language_id) VALUES (?,?,?)";
		//prepare query
		$stmt = $db->prepare($query);
		$stmt->bind_param("ssi",$args[0],$args[1],$args[2]);
		$result = $db->query($query);
		print_r($result);
	
}


