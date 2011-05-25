<?php

require_once('../api/includes/addExpertiseType.func.php');

class addExpertiseType extends UnitTestCase {

    function test_addExpertiseType() {

        $indata = array("name" => "Language spoken");
        $output = _addExpertiseType($indata);

        // kolla att vi inte ficken fail
        $this->assertNotEqual($output['status'], 'fail');
        // kolla att vi fick tillbaka ett id!
        $this->assertIsA($output['id'], 'int');
        //kolla också att jag kan hämta det jag stoppade in för att avsluta testet
        // TODO removwe testdata
    }

}

?>
