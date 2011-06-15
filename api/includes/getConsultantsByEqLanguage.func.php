<?php

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');


function _getConsultantsByEqLanguage($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();
	
	$language_id = $args['id'];

	$query2 = "SELECT persons.*, GROUP_CONCAT(expertise_like_expertise.like_expertise_id)AS like_lang
FROM persons, person__expertise, expertise, expertise_like_expertise
WHERE expertise.id = expertise_like_expertise.expertise_id
AND expertise_like_expertise.like_expertise_id = person__expertise.expertise_id
AND person__expertise.persons_id = persons.id
AND expertise.id = $language_id
AND persons.id NOT IN (SELECT persons.id
	FROM persons,person__expertise, expertise
	WHERE persons.id = person__expertise.persons_id
	AND person__expertise.expertise_id = expertise.id
	AND expertise.id = $language_id)
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
