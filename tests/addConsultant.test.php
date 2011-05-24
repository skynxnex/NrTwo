<?php

require_once('../config/config.php');
require_once('../simpletest/unit_tester.php');
require_once('../simpletest/autorun.php');
require_once('../includes/php/addConsultant.php');


class addConsultant extends UnitTestCase{
	
	function test_addConsultant(){
		
	$indata = array("name" => "pelle", "surname" => "olsson");
	$this->assertTrue(addConsultant($indata));
	}
}

?>
