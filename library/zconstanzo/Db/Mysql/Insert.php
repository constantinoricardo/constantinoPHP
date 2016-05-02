<?php

class Db_Mysql_Insert {
    
    protected $fields;
    protected $table;
    protected $values;
    protected $sql = "";
    
    public function setFields($fields) {
        $this->fields = $fields;
    }
    
    public function setTable($table) {
        $this->table = $table;
    }
    
    public function setValues($values) {
        $this->values = $values;
    }
    
    public function setQuery() {
        $this->sql .= "INSERT INTO ";
        $this->sql .= $this->table . " (" . $fields . ") VALUES ";
        $this->sql .= "( " . $this->values . " )";
    }
    
    public function getQuery() {
        return $this->sql;
    }
}

