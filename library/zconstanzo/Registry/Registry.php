<?php


class Registry_Registry {  
    
    private $class;
    private $method;          
    
    public function init() {                
        
        $uri = explode("/", $_SERVER['REQUEST_URI']);               
        
        $this->class = (isset($uri[2]) && !empty($uri[2])) ? $uri[2] : "index";
        $this->method = (isset($uri[3]) && !empty($uri[3])) ? $uri[3] : "index";
        
        $method = $this->method."Action";                        
        $classController = ucfirst($this->class)."Controller";        
        
        $controller = new $classController();        
        $controller->addParameters();
        
        $callback = array($controller, $method);                       
        call_user_func_array($callback, array());
        
        $this->redirectToView();
    }
    
    public function redirectToView() {
        $path = "view/".$this->class."/".$this->method.".phtml";  
        
        if (file_exists($path))            
            include $path;
        else             
            throw new Exception("Arquivo view não existe, por favor, crie.");
                        
    }
}