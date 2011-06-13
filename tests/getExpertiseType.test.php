<?php

require_once('../api/includes/getExpertiseTypes.func.php');

class getExpertiseTypes extends UnitTestCase {

    function test_getExpertiseTypes() {
    
       $result = _getExpertiseTypes();
	   $this->assertTrue($result);
	   
	   print_r($result);
        
    }

}

?>
