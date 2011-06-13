<?php

function _addProject($args = array()) {
	$connect = new MysqliConnect;
	$db = $connect->dbConnect();

	$name 		= $args['name'];
	$startDate 	= $args['startdate'];
	$endDate 	= $args['enddate'];
	$language_id = $args['language_id'];
	
	$query = "INSERT INTO projects (name, startdate, enddate, expertise_id) VALUES (?,?,?,?)";
	$stmt = $db->prepare($query);
	$stmt->bind_param("sssi", $name, $startDate, $endDate,$language_id);
	
	if ($stmt->execute()) {

		// Fetching ID from newly inserted person
		$project_id = $stmt->insert_id;
		
		return array(	'status' => 'success',
						'id' => $project_id,
						'error' => $stmt->error
					);
	}else{
		return array(	'status' => 'fail',
						'id' => $project_id,
						'error' => $stmt->error
					);
	} 
	
	
}
