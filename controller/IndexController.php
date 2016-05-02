<?php

class IndexController extends Controller_Controller {
    
    public function indexAction() {
        
        echo 'index <br />';
        $db = new Db_Select();
        
        $db->from('clientes', array('id', 'nome', 'profissao', 'data_nascimento'))
            ->where('id = ?', array(6), "or")
            ->where('id in (?,?,?)', array(1,2,4), "or")
            ->where('nome like ?', array('Leo%'), null);
        
        print '<pre>';
        print_r($db);
        exit;
        
         $query = $db->execute();
//
//         print '<pre>';
//         print_r($query->fetchAll());exit;   

//         echo $query->toStringQuery();exit;
    }
    
    public function inserirAction() {
        $db = new Db_Insert();
        $db->insert(array('nome' => 'Alvaro Tito', 'profissao'=>'cantor', 'data_nascimento'=>'1965-06-18'));
    }
    
    public function consultaAction() {
        echo "Consultando modulos e modulos";
//        exit;
    }
}
