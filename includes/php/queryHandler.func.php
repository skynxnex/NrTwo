<?php

function getJSON($query) {
    $mysqli = MysqliConnect::dbConnect();
    $mysqli->real_escape_string($query);
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $results = DynamicHandler::dynamicBindResults($stmt);

    if (empty($results)) {
        echo "fel";
    } else {
        // $response = json_encode($results);
        //header('Content-Type: application/json; charset=utf-8');
        // echo $response;
        return $response;
        exit;
    }
}

?>
