<?php

require_once('../config/config.php');
require_once('../api/includes/MysqlDB.php');

class Manager {
	
	private $mysqldb;

	function __construct() {
		$this->mysqldb = new MysqlDB(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_BASE);
	}

}
