<?php


require_once('../includes/php/addConsultant.php');


class addConsultant extends UnitTestCase{
	
	function test_addConsultant(){
		
	$indata = array("pelle","olsson","2");
	$this->assertTrue(addConsultant($indata));
	}
}

?>
