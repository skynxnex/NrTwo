<?php

require_once('../config/config.php');
require_once(INCLUDE_PATH.'/api/includes/MysqliConnect.php');
//include_once(INCLUDE_PATH.'/firephp/lib/FirePHPCore/FirePHP.class.php'); // php debug tillagd av pontus, bara att ignorera 

/**
 * 	
 * 	URL should be written as follows: /api/?/function_name
 * 	Includes file: function_name.func.php
 * 	Calls function: _function_name
 * 	All parameters to the function is sent by POST
 * */
 
// $firephp = FirePHP::getInstance(true); // php debug tillagd av pontus
// $connect = new MysqliConnect();
// $db = $connect->dbConnect();
 
$keys = array_keys($_GET);
$url = $keys[0];
$urlParts = explode("/", $url);
$action = $urlParts[1];
$file = INCLUDE_PATH . 'api/includes/' . $action . '.func.php';


if (file_exists($file)) {
    include($file);
    $return = call_user_func('_' . $action, $_POST);
} else {
    $return = array('info' => "no such file or function " . $action);
}

echo json_encode($return);
