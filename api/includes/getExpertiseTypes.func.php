<?php

/* param: array(string, string, int), inserts into db, returns: status, insertid,errormsg */

//require_once('../config/config.php');
//require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');
require_once "getJSON.func.php";


$get = new queryDb();

if (isset($_GET['action']) && $_GET['action'] == 'expertise') {
    $query = "SELECT * FROM expertise_type";
    $get->getJSON($query);
}


/*function _getExpertiseTypes() {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();

    $query = "SELECT * FROM expertise_type";
/*
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
    } */


    /* $stmt = $db->query($query);
      $returnArray = array();
      while ($obj = $stmt->fetch_object()) {

      $row = array("id" => $obj->id, "name" => $obj->name);
      $returnArray[] = $row;
      }
      return $returnArray; */
    //var_dump($returnArray);
    //$result = json_encode($returnArray);
    //echo $result;
//}

?>