<?php

class Controller_Controller {
    private $parameters = array();
    
    public function addParameters() {
        $type = $_SERVER['REQUEST_METHOD'];
           
        $inputs = array();
        
        $inputs = ($type == 'GET') ? filter_input_array(INPUT_GET) : filter_input_array(INPUT_POST);
        
        if (!empty($inputs)) {
            foreach ($inputs as $key => $input) {
                $this->parameters[$key] = $input;
            }
        }                
    }
    
    public function getParams() {
        return $this->parameters;
    }
    
    public function getParam($index) {
        return $this->parameters[$index];
    }
}

