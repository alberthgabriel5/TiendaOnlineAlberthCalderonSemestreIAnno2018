<?php


/**
 * Description of SesionModel
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class SesionModel {
    //put your code here
    protected $db;
    
    public function __construct() {
        //requerir conexion 
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    }//contructor
    
    function isClient($user, $pass) {
        $consulta= $this->db->prepare("CALL sp_exist_user ('$user','$pass');");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor 
        
        return $resultado;
    }
}
