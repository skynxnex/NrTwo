<?php

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');


function _getConsultantsByEqLanguage($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();
	
	$language_id = $args['id'];

	$query2 = "SELECT persons.*, expertise.name FROM
		persons,person__expertise,expertise
		WHERE persons.id = person__expertise.persons_id
		AND person__expertise.expertise_id = expertise.id
		AND expertise.id IN (SELECT expertise_like_expertise.like_expertise_id 
			FROM expertise_like_expertise 
			WHERE expertise_id = $language_id)		
		GROUP BY persons.id"
		;	
	
		 	$stmt = $db->query($query2);
			$returnArray = array();
		    while ($obj = $stmt->fetch_object()) {
		
		    	$row = array("id" => $obj->id, "firstname" => $obj->firstname,
		    	 "lastname" => $obj->lastname, "language" => $obj->name);
		    	$returnArray[] = $row;
	    	}
    	if($returnArray){	
			return $returnArray;
		}else{
			return array(	'status' => 'fail');
		}

 
}

?>