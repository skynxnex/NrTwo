<?php

/* param: array(string, string, int), inserts into db, returns: status, insertid,errormsg */

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _getExpertiseType($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();

    $query = "SELECT * FROM expertisetype";
    $stmt = $db->query($query);
    $returnArray = array();
    while ($obj = $stmt->fetch_object()) {

        $row = array("id" => $obj->id, "name" => $obj->name);
        $returnArray[] = $row;
    }

    var_dump($returnArray);
    return $returnArray;

}

?>