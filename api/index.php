<?php

require_once('../config/config.php');
require_once('../api/includes/Manager.php');
//include_once(INCLUDE_PATH.'/firephp/lib/FirePHPCore/FirePHP.class.php'); // php debug tillagd av pontus, bara att ignorera 

/**
 * 	
 * 	URL should be written as follows: /api/?/function_name
 * 	Includes file: function_name.func.php
 * 	Calls function: _function_name
 * 	All parameters to the function is sent by POST
 * */
 
// $firephp = FirePHP::getInstance(true); // php debug tillagd av pontus

$keys 		= array_keys($_GET);
$url 		= $keys[0];
$urlParts 	= explode("/", $url);
$action 	= '_'.$urlParts[1];

$manager	= new Manager();
$return		= "";

if (method_exists($manager, $action)) {
    $return = $manager->$action($_POST);
} else {
    $return = array('info' => "no such file or function " . $action);
}

header('Content-type: application/json: charset=utf-8');
echo json_encode($return);
