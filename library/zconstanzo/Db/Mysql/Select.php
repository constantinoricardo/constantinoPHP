<?php

class Db_Mysql_Select extends Db_Adapter_Where {
    
    protected $fields;
    protected $table;    
    protected $join = "";
    protected $having;     
    protected $limit;
    protected $group_by;        
    protected $order;
    protected $sql;
        
    public function setFields($campo = array()) {
        $this->fields = implode(", ", $campo);       
    }        
    
    public function setTable($table) {
        $this->table = $table;
    }
    
    public function setLimit($limit) {
        $limite = implode(", ", $limit);
        $this->limit = " LIMIT " . $limite; 
        return $this;        
    }
    
    public function setGroupBy($group_by) {
        $this->group_by = " GROUP BY " . $group_by;
        return $this;
    }
    
    public function setOrder($order, $type = null) {  
        
        if ($type == null || empty($type))
            $tp = "ASC";
        else
            $tp = strtoupper ($type);
        
        $this->order =  " ORDER BY " . $order . " " . $tp;
        return $this;
    }
    
    public function setHaving($having) {
        $this->having = " HAVING " .$having;
        return $this;
    }
    
    public function setJoin($table, $descricao, $type) {
        
        switch ($type) {
            case 'inner':
                $this->join .= "INNER JOIN ";
                break;
            
            case 'left':
                $this->join .= "LEFT JOIN ";
                break;
            
            case 'right':
                $this->join .= "RIGHT JOIN ";
                break;
            
            case 'cross':
                $this->join .= "CROSS JOIN ";
                break;
        }
        
        $this->join .= $table . " ON " . $descricao . " ";
        
    }
    
    public function setQuery() {
        $this->sql .= "SELECT ";
        $this->sql .= (!empty($this->fields)) ? $this->fields : " * ";
        $this->sql .= " FROM " . $this->table . " ";
        
        if (!empty($this->join)) 
            $this->sql .= $this->join;
        
        if (!empty($this->where)) 
            $this->sql .= "WHERE " . $this->where;
        
        if (!empty($this->group_by))
            $this->sql .= $this->group_by;
        
        if (!empty($this->order))
            $this->sql .= $this->order;
        
        if (!empty($this->limit)) 
            $this->sql .= $this->limit;
        
        if (!empty($this->having))
            $this->sql .= $this->having;
        
    }
    
    public function getQuery() {
        return $this->sql;
    }
    
}
