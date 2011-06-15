<?php

require_once('../config/config.php');
require_once('../api/includes/MysqlDB.php');

class Manager {

    private $mysqldb;
    private $success 	= array('status' => 'success');
    private $fail 		= array('status' => 'fail');

    function __construct() {
        $this->mysqldb = new MysqlDB(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_BASE);
    }

    public function _getConsultants() {

        $results = $this->mysqldb->get("persons");
        return $results;
    }

    public function _getExpertise() {
		$query = "SELECT * FROM expertise WHERE expertise_type_id = 2";
        $results = $this->mysqldb->query($query);
        return $results;
    }

    public function _getExpertiseTypes() {

        $results = $this->mysqldb->get("expertise_type");
        return $results;
    }

    public function _addExpertiseType($args = array()) {
    	$result = false;
        $name = array("name" => $args['name']);
        $result = $this->mysqldb->insert("expertise_type", $name);
        if($result) {
			return $this->success;
		}
		return $this->fail; 
    }
    
    public function _addExpertise($args = array()) {
    	$result = false;
    	$data = array (	'expertise_type' => $args['expertise_type'],
    					'name' => $args['name'],
	   					'desc' => $args['desc']
	   				);
        
        $result = $this->mysqldb->insert("expertise", $data);
        if($result) {
			return $this->success;
		}
		return $this->fail; 
    }
    
    public function _addConsultant($args = array()) {
		$result = false;
		$data = array(	'firstname' => $firstname = $args['firstname'],
						'lastname' => $args['lastname']);
						
		$result = $this->mysqldb->insert("persons", $data);
		
		if($result) {
			$this->mysqldb->toNull();
			$result = false;
			$id = $this->mysqldb->getLastInsertedId();
		
			$data = array(	'persons_id' => $id,
							'expertise_id' => $args['lang']
						);

			$result = $this->mysqldb->insert("person__expertise", $data);
			if($result) {
				return $this->success;
			}
		}
		return $this->fail; 
    }
    
    public function _getConsultantsByLanguage($args = array()) {
    	$result		= false;
    	$language 	= $args['id'];
		
		$query = "SELECT persons.*
		FROM persons,person__expertise, expertise
		WHERE persons.id = person__expertise.persons_id
		AND person__expertise.expertise_id = expertise.id
		AND expertise.id = $language";
		
		$result = $this->mysqldb->query($query);
		
		if($result) {
			return $result;
		}
		return $this->fail; 
    }
    
    public function _getConsultantsByEqLanguage($args = array()) {
    $result 		= false;
    $language_id	= $args['id'];
    
    $query = "SELECT like_consultants.firstname, like_consultants.lastname, expertise.name AS language
FROM expertise, (SELECT persons.*, GROUP_CONCAT(expertise_like_expertise.like_expertise_id)AS like_lang
FROM persons, person__expertise, expertise, expertise_like_expertise
WHERE expertise.id = expertise_like_expertise.expertise_id
AND expertise_like_expertise.like_expertise_id = person__expertise.expertise_id
AND person__expertise.persons_id = persons.id
AND expertise.id = $language_id
AND persons.id NOT IN (SELECT persons.id
	FROM persons,person__expertise, expertise
	WHERE persons.id = person__expertise.persons_id
	AND person__expertise.expertise_id = expertise.id
	AND expertise.id = $language_id)
GROUP BY persons.id)AS like_consultants
WHERE expertise.id = like_lang";	
    	
    	$results = $this->mysqldb->query($query);
		
		if($results) {
			return $results;
		}
		return $this->fail; 
    }
    
    public function _addProject($args = array()) {
    	 $result 	= false;
    	$name 		= $args['name'];
		$startDate 	= $args['startdate'];
		$endDate 	= $args['enddate'];
		$language_id = $args['language_id'];
		
		$data = array(	'name' => $name,
						'startdate' => $startDate,
						'enddate' => $endDate,
						'expertise_id' => $language_id
						);
		$result = $this->mysqldb->insert("projects", $data);
		if($result) {
			return $this->success;
		}
		return $this->fail; 
    }

}
