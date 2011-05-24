<?php

require_once('../config/config.php');
require_once('../simpletest/unit_tester.php');
require_once('../simpletest/autorun.php');
require_once('../includes/php/dbConnect.php');

class dbconnect extends UnitTestCase {

	private $db = "";

	function __construct() {
		$this->db = new MysqliConnect;
	}
	
	function test_true() {
		$this->assertTrue($this->db->dbConnect());
	}
}
