<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormularioModel
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class FormularioModel {
    //put your code here
     protected $db;
    
    public function __construct() {
        //requerir conexion 
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    }//contructor
     public function formular(){
        $consulta= $this->db->prepare('CALL sp_listar()');
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        return $resultado;
    }//listar
     public function insertar($articulo){
        $consulta= $this->db->prepare("CALL sp_insert_articulo('$articulo')");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        return $resultado;
    }//insertar
    
    
     
}
