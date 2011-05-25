<?php


require_once('../api/includes/addExpertise.func.php');


class addExpertise extends UnitTestCase{
	
	function test_addExpertise(){
		
	$indata = array("name" => "Spanska", "desc" => "olé", "expertiseType" => "1");  //1 exists in db 
	$output = _addExpertise($indata);
	
	// kolla att vi inte ficken fail
	$this->assertNotEqual($output['status'],'fail');
	// kolla att vi fick tillbaka ett id!
	$this->assertIsA($output['id'],'int');
	//kolla också att jag kan hämta det jag stoppade in för att avsluta testet
	// TODO removwe testdata
	}
}

?>
