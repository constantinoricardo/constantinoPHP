<?php

abstract class Db_Adapter_Select {  
    
    protected $object;   
    
    public function __construct($database) {                
        $object = "Db_".ucfirst($database)."_Select";                        
        $this->object = new $object();             
    }
    
    abstract public function from($table, $fields);
    
    abstract public function where($string, $values, $operator);
           
    abstract public function join($table, $descricao, $type);
    
    abstract public function limit($limit = array());
    
    abstract public function group($group);
    
    abstract public function order($order, $type = null);
    
    abstract public function having($having);
    
    abstract public function query($sql);
    
    abstract public function execute();
        
}