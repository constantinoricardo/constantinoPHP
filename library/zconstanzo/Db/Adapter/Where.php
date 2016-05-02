<?php

class Db_Adapter_Where {
     
    protected $where;
    protected $bind_values = array();    
        
    public function setWhere($field, $values, $condiction = null) {
        
        $this->where .= $field;
        
        if (sizeof($this->bind_values) > 0) 
            $this->bind_values[sizeof ($this->bind_values)] = $values;
        else
            $this->bind_values[0] = $values;
                        
        $this->setCondiction($condiction);
    }        
            
    private function setCondiction($condiction) {
        if ($condiction != null)
            $this->where .= " " . $condiction . " ";
    }
    
    public function getBindValues() {
        return $this->bind_values;
    }
    
    public function getWhere() {
        return $this->where;
    }       
}