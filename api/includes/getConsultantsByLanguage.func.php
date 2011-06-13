<?php

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _getConsultantsByLanguage($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();
	
	$language = $args['id'];
		
    $query = "SELECT persons.*
	FROM persons,person__expertise, expertise
	WHERE persons.id = person__expertise.persons_id
	AND person__expertise.expertise_id = expertise.id
	AND expertise.id = $language"
	;
 	$stmt = $db->query($query);
	
	if($stmt){
    $returnArray = array();
    while ($obj = $stmt->fetch_object()) {

    	$row = array("id" => $obj->id, "firstname" => $obj->firstname, "lastname" => $obj->lastname);
    	$returnArray[] = $row;
    	}
     	return $returnArray;
	}else{
		return array('status' => 'fail');
	} 
 
}

?>
