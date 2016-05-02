<?php

class ClientesController extends Controller_Controller {
    
    public function indexAction() {
        echo 'index do framework';
        exit;
    }
    
    public function incluirAction() {
        $nome = $this->getParam('nome');
    }
}

