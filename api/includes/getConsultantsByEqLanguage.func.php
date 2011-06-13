<?php

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _getConsultantsByEqLanguage($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();
	
	$language_id = $args['id'];

	$query = "SELECT expertise_like_expertise.like_expertise_id 
			FROM expertise_like_expertise 
			WHERE expertise_id = $language_id";
		
	$stmt = $db->query($query);
	
	$like_expertiseArray = array();
	while ($obj = $stmt->fetch_object()) {

		$like_expertiseArray[] = (int) $obj->like_expertise_id;	
		}	
	if($like_expertiseArray){
	 	 
		$var = $like_expertiseArray[0];
			
		$query2 = "SELECT persons.* FROM
		persons,person__expertise, like_expertise,expertise
		WHERE persons.id = person__expertise.persons_id
		AND person__expertise.expertise_id = expertise.id
		AND expertise.id = $var
		GROUP BY persons.id"
		;	
		 	$stmt = $db->query($query2);
			$returnArray = array();
		    while ($obj = $stmt->fetch_object()) {
		
		    	$row = array("id" => $obj->id, "firstname" => $obj->firstname, "lastname" => $obj->lastname);
		    	$returnArray[] = $row;
	    	}	
		
	}else{
		return array(	'status' => 'fail');
	}

 
}

?>