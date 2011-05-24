<?php

require_once('dbConnect.php');

function addConsultant($args){
	$connect = new MysqliConnect();
	$db = $connect->dbConnect();
	//hämta dbuppkoppling?
	//hämta värdena ur arrayen
	//bygg query
	//skicka query
	//return sucess eller fail	
		
		$arg1= $args[0];
		$arg2= $args[1];
		$arg3= $args[2];
		$query = "INSERT INTO persons (firstname, surname, language_id) VALUES ($arg1,$arg2,$arg3)";
		$result = $db->query($query);
		print_r($result);
	
}


