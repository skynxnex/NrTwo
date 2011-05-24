<?php


require_once('../includes/php/addConsultant.func.php');


class addConsultant extends UnitTestCase{
	
	function test_addConsultant(){
		
	$indata = array("pelle","olsson","2");
	$output = _addConsultant($indata);
	
	// kolla att vi inte ficken fail
	$this->assertNotEqual($output['status'],'fail');
	// kolla att vi fick tillbaka ett id!
	$this->assertIsA($output['id'],'int');
	//kolla också att jag kan hämta det jag stoppade in för att avsluta testet
	// TODO removwe testdata
	}
}

?>
