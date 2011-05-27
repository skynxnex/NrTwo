<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getJSON
 *
 */
class queryDb {

    function getJSON($query) {
        //var_dump($query);
        $connect = new MysqliConnect;
        $db = $connect->dbConnect();
        $db->real_escape_string($query);
        $stmt = $db->prepare($query);
        $stmt->execute();
        $results = DynamicHandler::dynamicBindResults($stmt);

        if (empty($results)) {
            //global $error;
            //$error->getMessage(3);
        } else {
            //$response = json_encode($results);
            // header('Content-Type: application/json; charset=utf-8');
            //  echo $response;
            return $results;

            exit;
        }
    }

}

?>
