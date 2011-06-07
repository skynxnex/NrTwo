<?php

class dbconnect extends UnitTestCase {

	private $db = "";

	function __construct() {
		$this->db = new MysqliConnect;
	}
	
	function test_dbconnect() {
		$this->assertTrue($this->db->dbConnect());
		$conn = $this->db->dbConnect();
	}
}
