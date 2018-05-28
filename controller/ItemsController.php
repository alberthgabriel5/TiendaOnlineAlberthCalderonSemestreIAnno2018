<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ItemsController {
    
    private $view;
    
    public function __construct() {
        $this->view=new View();
    } // constructor
    
    
    public function listar(){
        require 'model/ItemsModel.php';
        $items=new ItemsModel();
        $data['listado']= $items->listar();
//        $data['listado']= array(
//            "001"=>"arroz",
//            "002"=>"frijoles"
//        );
        $this->view->show("listar.php", $data);
    } // listar
    
} // fin clase

?>
