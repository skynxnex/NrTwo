<?php

/**
 * Description of DynamicHandler
 *
 * Dynamicly handles the prepared statments and binds the result parameters
 * 
 */
class DynamicHandler {

    public function __construct() {
        
    }

    public function dynamicBindResults($stmt) {
        $parameters = array();
        $results = array();

        $meta = $stmt->result_metadata();

        while ($field = $meta->fetch_field()) {
            $parameters[] = &$row[$field->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $parameters);

        while ($stmt->fetch()) {
            $arr = array();
            foreach ($row as $key => $val) {
                $arr[$key] = $val;
            }
            $results[] = $arr;
        }
        return $results;
    }

}

?>
