<?php

/* param: array(string, string, int), inserts into db, returns: status, insertid,errormsg */

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _addExpertise($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();

    $query = "INSERT INTO expertise (name, description, expertise_type_id) VALUES (?,?,?)";
    $stmt = $db->prepare($query);

    $expertise_type = $args['expertise_type'];
    $name = $args['name'];
    $desc = $args['desc'];
    $stmt->bind_param("ssi", $name, $desc, $expertise_type);
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
