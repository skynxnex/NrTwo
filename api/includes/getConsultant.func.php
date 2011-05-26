<?php

/* param: array(string, string, int), inserts into db, returns: status, insertid,errormsg */

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _getConsultant() {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();

    $query = "SELECT * FROM persons";

    $db->real_escape_string($query);
    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = DynamicHandler::dynamicBindResults($stmt);

    if (empty($results)) {
        //global $error;
        //$error->getMessage(3);
        echo "fel";
    } else {
        //$response = json_encode($results);
       // header('Content-Type: application/json; charset=utf-8');
       // echo $response;
        return $results;
        exit;
    }
}
?>
