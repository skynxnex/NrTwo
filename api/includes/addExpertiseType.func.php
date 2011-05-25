
<?php

/* param: array(string, string, int), inserts into db, returns: status, insertid,errormsg */

require_once('../config/config.php');
require_once(INCLUDE_PATH . '/api/includes/MysqliConnect.php');

function _addExpertiseType($args = array()) {

    $connect = new MysqliConnect;
    $db = $connect->dbConnect();

    $query = "INSERT INTO expertisetype (name) VALUES (?)";
    $stmt = $db->prepare($query);

    $name = $args['name'];
    $stmt->bind_param("s", $name);

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
