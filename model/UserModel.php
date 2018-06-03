<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class UserModel {
    protected $db;
    
    public function __construct() {
        //requerir conexion 
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    }//contructor
     public function listar(){
        $consulta= $this->db->prepare("CALL sp_listar_client();");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        return $resultado;
    }//listar    
     public function formular(){
        $consulta= $this->db->prepare("CALL sp_listar_admin();");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        return $resultado;
     }//formular
     public function select($id){
        $consulta= $this->db->prepare("CALL sp_select_user_id('$id');");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        return $resultado;
     }//formular
     public function insertar($email,$nick,$secure,$age,$rol){
        $consulta= $this->db->prepare("CALL sp_insert_user('$email','$nick','$secure','$age','$rol');");
        $consulta->execute();
        $consulta->closeCursor();//no olvidadar cerrar el cursor        
        return $consulta;
    }//insertar
     public function actualizar($id, $email,$nick,$secure,$age,$rol,$active){
        $consulta= $this->db->prepare("CALL sp_update_user ('$id',' $email','$nick','$secure','$age','$rol','$active');");
        $consulta->execute();        
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        
        return $consulta; 
    }//actualizar
     public function eliminar($id){
        $consulta= $this->db->prepare("CALL sp_delete_tipo_produto ('$id');");
        $consulta->execute();        
        $consulta->closeCursor();//no olvidadar cerrar el cursor        
        return $consulta;
    }//insertar
    
}
