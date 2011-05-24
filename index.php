<?php

require_once('config/config.php');
$html = file_get_contents(INCLUDE_PATH.'/includes/html/index.html');
echo $html;

if(isset($_GET['action'])) {
	$action = $_GET['action'];
	$file = INCLUDE_PATH.'library/'.$_GET['action'].'.func.php';
	$args = "";

	if(isset($_GET['args'])) {
		$args = $_GET['args'];
	} else {
		echo "Need arguments for function";
	}
	
	if(file_exists($file)) {
		include($file);
		echo json_encode(call_user_func($action, $args));
	} else {
		echo "no such file or function ".$action;
	}
}
