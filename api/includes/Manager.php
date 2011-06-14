<?php

require_once('../config/config.php');
require_once('../api/includes/MysqlDB.php');

class Manager {

    private $mysqldb;

    function __construct() {
        $this->mysqldb = new MysqlDB(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_BASE);
    }

    public function _getConsultants() {

        $results = $this->mysqldb->get("persons");
        return $results;
    }

    public function _getExpertise() {

        $results = $this->mysqldb->query("SELECT * FROM expertise WHERE expertise_type_id = 2");
        return $results;
    }

    public function _getExpertiseTypes() {

        $results = $this->mysqldb->get("expertise_type");
        return $results;
    }

    public function _addExpertiseType($args = array()) {
        //$name = "$args['name'];
        $name = "apa";
        var_dump($name);
        $results = $this->mysqldb->insert("expertise_type", $name);
        return $results;
    }

}
