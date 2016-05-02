<?php

class Db_Insert extends Db_Adapter_Insert {
    
    protected $query;
    
    public function __construct() {        
        $factory = new Db_Factory_Connection();
        $bind = $factory->getConfigs();
        $database = $bind['name'];
        parent::__construct($database);                        
    }
    
    public function setTable($table) {
        $this->object->setTable($table);
    }
    
    public function insert($data) {
        $fields = array();
        $values = array();
        $insertsValues = array();
        
        foreach ($data as $key => $dates) {
            $fields[] = $key;
            $values[] = $dates;
            $insertsValues[] = "?";
        }
        
        $this->object->setFields(implode(", ", $fields));
        $this->object->setValues(implode(", ", $insertsValues));
        
        print '<pre>';
        print_r($this->object);exit;
        
        print '<pre>';
        print_r($values);
        exit;
    }
    
    public function lastInsertId() {
        
    }
}

