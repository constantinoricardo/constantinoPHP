<?php

abstract class Db_Adapter_Insert {
    
    protected $object;
    
    public function __construct($database) {
        $object = "Db_".  ucfirst($database) . "_Insert";
        $this->object = new $object();
    }
    
    abstract public function insert($data);
    
    abstract public function lastInsertId();
}

