<?php

/* param: array(string, string, int), inserts into db, returns: status, insertid,errormsg */

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _getConsultants() {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();

    $query = "SELECT * FROM persons";

    $db->real_escape_string($query);
    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = DynamicHandler::dynamicBindResults($stmt);

    if (empty($results)) {
        echo "fel";
    } else {
        return $results;
        exit;
    }

}

?>