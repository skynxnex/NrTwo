<?php


/*
 *  Class for MySQLi connection and database selection 
 */


class MysqliConnect {

    // public $mysqli;
    private $db_hostname;
    private $db_database;
    private $db_username;
    private $db_password;
    private static $connection;

    public function __construct() {
        $this->db_hostname = DATABASE_HOST;
        $this->db_username = DATABASE_USER;
        $this->db_password = DATABASE_PASS;
        $this->db_database = DATABASE_BASE;
    }

    public function dbConnect() {
        if (empty(self::$connection)) {
            self::$connection = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);
            self::$connection->set_charset("utf8");
        }
        return self::$connection;
    }
	

}

/* else {
  die('Connect Error (' . self::$connection->connect_errno . ') ' . self::$connection->connect_error);
  } */
?>
