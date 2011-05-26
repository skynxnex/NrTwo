<?php

/* param: array(string, string, int), inserts into db, returns: status, insertid,errormsg */

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _addExpertise($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();

    $query = "INSERT INTO expertise (expertiseType_id, name, description) VALUES (?,?,?)";
    $stmt = $db->prepare($query);

    $expertiseType = $args['expertiseType'];
    $name = $args['name'];
    $desc = $args['desc'];
    $stmt->bind_param("iss", $expertiseType, $name, $desc);

    if ($stmt->execute()) {
        return array('status' => 'success',
            'id' => $stmt->insert_id,
            'error' => $stmt->error
        );
    } else {
        return array('status' => 'fail',
            'id' => $stmt->insert_id,
            'error' => $stmt->error
        );
    }
}

?>