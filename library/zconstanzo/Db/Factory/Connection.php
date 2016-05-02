<?php

class Db_Factory_Connection {

    private $enviorment;        //ambiente de homologacao (development) ou producao (production)
    protected $configs = array();
    private static $instance;       

    public function __construct() {
        $this->getEnviorment();
        $this->getConfigFiles();
    }

    public function getInstance() {
        if (!isset(self::$instance)) {           
            
            switch ($this->configs['name']) {
                case 'mysql':
                    $base = $this->configs['name'].":host=".$this->configs['service'].";dbname=".$this->configs['dbname'];
                    $root = $this->configs['user'];
                    $pass = $this->configs['password'];                   
                    
                    self::$instance = new PDO($base, $root, $pass, array(PDO::ATTR_PERSISTENT => true));
                break;
            }
            
            return self::$instance;
        }
    }
    
    public function getEnviorment() {
        $dados = file('./config/database.ini');
        $vector = $dados[0];
        $array = preg_split('/[.=]+/', $vector);
        $this->enviorment = trim($array[2]);        
    }

    private function getConfigFiles() {
        $dados = file("./config/database.ini");                       
        
        foreach ($dados as $dado) {
            $line = explode(".", $dado);
                                   
            if (!isset($line[1]))
                continue;
                       
            if ($line[1] == $this->enviorment) {                 
                $registro = explode("=", $line[2]);
                $name = trim($registro[0]);
                $value = trim($registro[1]);
                
                $this->configs[$name] = $value;
            }
        }        
    }
    
    public function getConfigs() {
        return $this->configs;
    }

}
