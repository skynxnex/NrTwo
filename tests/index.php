<?php

require_once('../config/config.php');
require_once('../simpletest/unit_tester.php');
require_once('../simpletest/autorun.php');

/* Class includes */
	
function __autoload($className) {
	$classPaths = array('/library/', '/includes/php/'); 
	$ext = '.php';
	foreach ($classPaths as $classPath) {
		$full_path = INCLUDE_PATH . $classPath . $className . $ext;
		if (file_exists($full_path)) {
			include $full_path;
			break;
		}
	}
}

if (isset($_GET['test'])) {
	require_once(INCLUDE_PATH . '/tests/' . $_GET['test'] . '.test.php');
}

function getDirectoryList ($directory) {
	// create an array to hold directory list
	$results = array();
	// create a handler for the directory
	$handler = opendir($directory);
	// open directory and walk through the filenames
	while ($file = readdir($handler)) {
		// if file isn't this directory or its parent, add it to the results
		if ($file != "." && $file != "..") {
			$results[] = $file;
		}
	}
	// tidy up: close the handler
	closedir($handler);
	// done!
	return $results;
}

echo '
<style>
	html, body {font: 14px helvetica, sans-serif;}
	#navcontainer {font-size:12px; margin: 0;padding: 0;height: 22px;width: 100%;border-bottom: 1px solid #bbb;}
	#navlist {list-style-type: none;margin: 0;padding: 0;}
	#navlist li {float: left;margin: 0;padding: 0;width: auto;display: block;}
	#navlist li a, #navlist li a:link {background: #fff;color: #555;text-decoration: none;padding: 3px 5px 3px 5px;display: block;}
	#navlist li a:hover {color: #039;border-bottom: 3px solid #bbb;cursor: pointer;background: #eee;}
	#navlist li a#current, #navlist li a#current:link {color: #000;cursor: default;font-weight: bold;border-bottom: 3px solid #999;}
	#navlist li a#current:hover {border-bottom: 3px solid #f90;background: #eee;}
	h1 {display:none;}
	h2 {}
</style>';

$filelist = getDirectoryList(INCLUDE_PATH . '/tests/');
asort($filelist);
echo '<div id="navcontainer"><ul id="navlist">';
if (!isset($_GET['test'])) {
	echo '<li><a href="index.php" id="current">Home</a></li>';
} else {
	echo '<li><a href="index.php">Home</a></li>';
}
foreach ($filelist as $file) {
	$file = explode('.', $file);
	if($file[0] != "index") {
		if (isset($_GET['test']) && $file[0] == $_GET['test']) {
			echo '<li><a href="?test=' . $file[0] . '" id="current">' . $file[0] . '</a></li>';
		} else {
			echo '<li><a href="?test=' . $file[0] . '">' . $file[0] . '</a></li>';
		}
	}
}
echo '</ul></div>';
if (isset($_GET['test'])) {
	echo '<h3>Test: '.$_GET['test'].'</h3>';
} else {
	echo '<h3>Page: Index</h3>';
}
class index extends UnitTestCase {function test_true() {$this->assertTrue(true);}}

?>

