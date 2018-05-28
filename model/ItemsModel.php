<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemsModel
 *
 * @author laboratorios
 */
class ItemsModel {
    //put your code here
    
    protected $db;
    
    public function __construct() {
        //requerir conexion 
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    }//contructor
    
    public function listar(){
        $consulta= $this->db->prepare('CALL sp_listar()');
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        return $resultado;
    }//listar
    
    
}//fin clase

