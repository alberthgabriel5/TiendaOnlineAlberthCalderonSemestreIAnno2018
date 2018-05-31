<?php
/**
 * Description of ProductModel
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class ProductModel {
    //put your code here
    protected $db;
    
    public function __construct() {
        //requerir conexion 
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    }//contructor
    
    public function allproducts(){
        $consulta= $this->db->prepare("CALL sp_listar_producto();");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        return $resultado;
    }//listar
    public function addProduct($articulo,$categoria, $precio, $descripcion,$pic){
//        echo 'entro insertar';
        $consulta= $this->db->prepare("CALL sp_insert_producto ('$articulo','$categoria',' $precio','$descripcion','$pic');");
        //echo "CALL sp_insert_producto('$articulo','$categoria',' $precio','$descripcion','$pic');<br>";
        $consulta->execute();        
        $consulta->closeCursor();//no olvidadar cerrar el cursor                
        return $consulta;
    }//insertar
    public function formularCategoria(){
        $consulta= $this->db->prepare("CALL sp_listar_tipo_productos();");
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        return $resultado;
    }
    public function actualizar($id,$articulo,$categoria, $precio, $descripcion,$pic){
        $consulta= $this->db->prepare("CALL sp_update_producto ('$id','$articulo','$categoria',' $precio',' $descripcion','$pic)');");
        $consulta->execute();        
        $consulta->closeCursor();//no olvidadar cerrar el cursor
        
        return $consulta;
    }//actualizar
     public function eliminar($id){
        $consulta= $this->db->prepare("CALL sp_delete_produto ('$id');");
        $consulta->execute();
        
        $consulta->closeCursor();//no olvidadar cerrar el cursor        
        return $consulta;
    }//insertar
}
