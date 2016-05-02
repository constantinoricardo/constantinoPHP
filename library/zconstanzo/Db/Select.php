<?php

class Db_Select extends Db_Adapter_Select {        
        
    protected $query;    
    
    public function __construct() {        
        $factory = new Db_Factory_Connection();
        $bind = $factory->getConfigs();
        $database = $bind['name'];
        parent::__construct($database);                        
    }    
    
    public function from($table, $fields) {
        $this->object->setFields($fields);
        $this->object->setTable($table);
        return $this;
    }
    
    public function where($string, $values, $operator) {                
        $this->object->setWhere($string, $values, $operator);        
        return $this;
    }
    
    public function join($table, $descricao, $type) {
        $this->object->setJoin($table, $descricao, $type);
        return $this;
    }
    
    public function limit($limit = array()) {
        $this->object->setLimit($limit);
        return $this;
    }
    
    public function group($group) {
        $this->object->setGroupBy($group);
        return $this;
    }
    
    public function order($order, $type = null) {
        $this->object->setOrder($order, $type);
        return $this;
    }
    
    public function having($having) {
        $this->object->setHaving($having);
        return $this;
    }
    
    public function execute() {
        $objeto = $this->object;       
        $objeto->setQuery();
        $this->query = $objeto->getQuery();        
                
        $execute = new Db_Adapter_Execute();
        $execute->setValues($this->object->getBindValues());
        $execute->setQuery($this->query);
                
        return $execute->execute();                
    }
    
    public function query($sql) {
        $execute = new Db_Adapter_Execute();        
        $execute->setQuery($sql);
        return $execute->query();
    }
    
    public function toStringQuery() {
        die($this->query);        
    }            
}
