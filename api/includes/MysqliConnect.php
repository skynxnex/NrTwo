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

    public function __construct($hostname=DATABASE_HOST, $username=DATABASE_USER, 
    							$password=DATABASE_PASS, $database=DATABASE_BASE) {
        $this->db_hostname = $hostname;
        $this->db_username = $username;
        $this->db_password = $password;
        $this->db_database = $database;
    }

    public function dbConnect() {
        if (empty(self::$connection)) {
            self::$connection = new mysqli($this->db_hostname,$this->db_username,$this->db_username,$this->db_database);
            self::$connection->set_charset("utf8");
        }
        return self::$connection;
    }
	

}

/* else {
  die('Connect Error (' . self::$connection->connect_errno . ') ' . self::$connection->connect_error);
  } */
?>
