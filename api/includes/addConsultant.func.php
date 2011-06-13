<?php
/*param: array(string, string, int), inserts into db, returns: status, insertid,errormsg*/

require_once('../config/config.php');
require_once(INCLUDE_PATH.'/api/includes/MysqliConnect.php');

function _addConsultant($args = array()){
	
	
	$connect = new MysqliConnect;
	$db = $connect->dbConnect();

	$query = "INSERT INTO persons (firstname, lastname) VALUES (?,?)";
	$stmt = $db->prepare($query);
	
	$firstname = $args['firstname'];
	$lastname = $args['lastname'];
	$language_id = $args['lang'];
	
	$stmt->bind_param("ss", $firstname, $lastname);
	if ($stmt->execute()) {

		// Fetching ID from newly inserted person
		$person_id = $stmt->insert_id;
		
		$query = "INSERT INTO person__expertise (persons_id, expertise_id) VALUES (?,?)";
		$stmt = $db->prepare($query);
		$stmt->bind_param("ii", $person_id, $language_id);
		
		if($stmt->execute()) {
			return array(	'status' => 'success',
							'id' => $person_id,
							'error' => $stmt->error
						);
		}else{
			return array(	'status' => 'fail',
							'id' => $person_id,
							'error' => $stmt->error
						);
		} 
	}else{
		return array(	'status' => 'fail',
						'id' => $stmt->insert_id,
						'error' => $stmt->error
					);
	}

}


