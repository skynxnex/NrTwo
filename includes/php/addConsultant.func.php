<?php
/*param: array(string, string, int), inserts into db, returns: status, insertid,errormsg*/

function _addConsultant($args = array()){
	
	$connect = new MysqliConnect();
	$db = $connect->dbConnect();

	$query = "INSERT INTO persons (firstname, surname, language_id) VALUES (?,?,?)";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ssi",$args[0],$args[1],$args[2]);
	
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


