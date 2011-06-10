<?php

require_once('../config/config.php');
require_once('../api/includes/getConsultantsByEqLanguage.func.php');

class getConsultantsByEqLanguage extends UnitTestCase {

    function test_getConsultantsByEqLanguage() {
    
       $language = _getConsultantsByEqLanguage(array('id' => 3));
        
		//kolla att det vi får inte är tomt
		//$this->assertTrue($language);
		//kolla att vi fått en lista med ord
		print_r($language);
    }

}

?>