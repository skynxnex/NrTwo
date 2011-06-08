<?php

require_once('../config/config.php');
require_once('../api/includes/listLanguage.func.php');

class listLanguage extends UnitTestCase {

    function test_listLanguage() {
    
       $language = _listLanguage();
        
		//kolla att det vi får inte är tomt
		$this->assertTrue($language);
		//kolla att vi fått en lista med ord
		print_r( $language);
    }

}

?>