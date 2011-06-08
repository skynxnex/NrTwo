<?php

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _listLanguage($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();

    $query = "SELECT id, name FROM expertise WHERE expertise_type_id= 1";
   
 	$stmt = $db->query($query);
    $returnArray = array();
    while ($obj = $stmt->fetch_object()) {

    	$row = array("id" => $obj->id, "name" => $obj->name);
    	$returnArray[] = $row;
    	}
    return $returnArray;
 
 
}

?>