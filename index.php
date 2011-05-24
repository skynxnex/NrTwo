<?php

require_once('config/config.php');
$html = file_get_contents(INCLUDE_PATH.'/includes/html/index.html');
echo $html;
