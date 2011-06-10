<?php

require_once('../config/config.php');
require_once('../api/includes/getConsultantsByLanguage.func.php');

class getConsultantsByLanguage extends UnitTestCase {

    function test_getConsultantsByLanguage() {
    
       $language = _getConsultantByLanguage(array('id' => 3));
        
		//kolla att det vi får inte är tomt
		//$this->assertTrue($language);
		//kolla att vi fått en lista med ord
		print_r($language);
    }

}

?>