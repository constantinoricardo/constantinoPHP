<?php

class Autoload {

    private $dir_projeto;
    private $dir_framework;

    public function separatorProject() {                  
        
        $dir = str_replace("\\", "/", __DIR__);         
        $separator = preg_split('/[\/]+/', $dir);                     
        $separator = array_reverse($separator);                     

        $this->dir_projeto = $separator[3];
        $this->dir_framework = $separator[2]."/".$separator[1];  
       
    }

    private function runAutoload($classname) {
        $folders = array('controller', 'model');                

        foreach ($folders as $folder) {
            $file = "../" . $this->dir_projeto . "/" . $folder . "/" . $classname . ".php";                                
            
            if (file_exists($file))
                include $file;
        }
    }
    
    private function runAutoloadFramework($classname) {
        $classname = str_replace("_", "/", $classname);        
        $file = $this->dir_framework."/".$classname.".php";                                
        
        if (file_exists($file))
            include $file;
    }

    public function Loader() {
        $this->separatorProject();                

        spl_autoload_register(array($this, 'runAutoload'));
        spl_autoload_register(array($this, 'runAutoloadFramework'));
    }

}
