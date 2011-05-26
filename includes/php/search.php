<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search
 *
 */
class Search {

    public function __construct() {
        
    }

    public function getJSON($query) {
        //var_dump($query);
        $mysqli = MysqliConnect::dbConnect();
        $mysqli->real_escape_string($query);
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $results = DynamicHandler::dynamicBindResults($stmt);

        if (empty($results)) {
            //global $error;
            //$error->getMessage(3);
            echo "fel";
        } else {
            $response = json_encode($results);
            header('Content-Type: application/json; charset=utf-8');
            echo $response;
            exit;
        }
    }

}

?>
