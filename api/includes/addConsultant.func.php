<?php
/*param: array(string, string, int), inserts into db, returns: status, insertid,errormsg*/

require_once('../config/config.php');
require_once(INCLUDE_PATH.'/api/includes/MysqliConnect.php');

function _addConsultant($args = array()){
	
	
	$connect = new MysqliConnect;
	$db = $connect->dbConnect();

	$query = "INSERT INTO person (firstname, lastname) VALUES (?,?)";
	$stmt = $db->prepare($query);
	
	$firstname = $args['firstname'];
	$lastname = $args['lastname'];
	$stmt->bind_param("ss", $firstname, $lastname);
	
	if($stmt->execute()) {
		return array(	'status' => 'success',
						'id' => $stmt->insert_id,
						'error' => $stmt->error
					);
	}else{
		return array(	'status' => 'fail',
						'id' => $stmt->insert_id,
						'error' => $stmt->error
					);
		}

}


