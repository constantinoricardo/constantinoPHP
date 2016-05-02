<?php

class Db_Adapter_Execute {
    
    private $db;
    private $values;
    private $query;   
        
    public function __construct() {
        $factory = new Db_Factory_Connection();
        $this->db = $factory->getInstance();
    }
    
    public function setValues($values) {
        $this->values = $values;
    }
    
    public function setQuery($query) {
        $this->query = $query;
    }
    
    public function getValues() {
        return $this->values;
    }
    
    public function getQuery() {
        return $this->query;
    }        
    
    public function query() {
        try {
            
            $resource = $this->db->query($this->getQuery());            
            return $resource;
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function execute() {
        
        try {          
            $values = array();
            $elements = $this->getValues();                                    
            $resource = $this->db->prepare($this->getQuery());        
            
            if (count($elements) > 0) {
                foreach ($elements as $value) {
                    foreach ($value as $res) {
                        $values[] = $res;
                    }
                }
            }            
            $resource->execute($values);                        
            return $resource;
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
