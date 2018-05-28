<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeProductModel
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class TypeProductModel {
   //put your code here
     protected $db;
    
    public function __construct() {
        //requerir conexion 
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    }//contructor
     public function formular(){
        $consulta= $this->db->prepare("CALL `sp_listar_tipo_productos`();");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        
        return $resultado;
    }//listar
     public function insertar($articulo){
        $consulta= $this->db->prepare("CALL sp_insert_tipo_producto ('$articulo');");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        
        return $resultado;
    }//insertar
     public function actualizar($id,$articulo){
        $consulta= $this->db->prepare("CALL sp_update_tipo_producto ('$id','$articulo');");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        
        return $resultado;
    }//actualizar
     public function eliminar($id){
        $consulta= $this->db->prepare("CALL sp_delete_tipo_produto ('$id');");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor        
        return $resultado;
    }//insertar
}
