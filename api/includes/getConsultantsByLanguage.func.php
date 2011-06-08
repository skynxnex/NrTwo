<?php

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _getConsultantByLanguage($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();
	
	$language = $args[0];
	
    $query = "SELECT persons.*
	FROM persons,person__expertise, expertise
	WHERE persons.id = person__expertise.persons_id
	AND person__expertise.expertise_id = expertise.id
	AND expertise.name = '$language'"
	;
  
 	$stmt = $db->query($query);
	 
    $returnArray = array();
    while ($obj = $stmt->fetch_object()) {

    	$row = array("id" => $obj->id, "firstname" => $obj->firstname, "lastname" => $obj->lastname);
    	$returnArray[] = $row;
    	}
    return $returnArray;

 
}

?>