<?php

/**
 * Description of TypeProductController
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class TypeProductController {
    private $view;
    
    public function __construct() {
        $this->view=new View();
        
    } // constructor
    
    
    public function listar(){
        require 'model/TypeProductModel.php';
        $items=new TypeProductModel();
        $data['listado']= $items->formular();

        $this->view->show("typeProduct.php", $data);
    } // listar
    
    public function insertar() {
        require 'model/TypeProductModel.php';
        $items=new TypeProductModel();
        $articulo = $_POST['articulo'];

        $result = $items->insertar($articulo);
        if ($result) {
            $error= "Insertado exitoso";
        } else {
            $error= "Fallo en el proceso intentelo de nuevo";
        }
        $data['listado'] = $items->formular();

        $this->view->show("typeProduct.php", $data);
    }
    
    public function update() {
        require 'model/TypeProductModel.php';
        $items=new TypeProductModel();
        $articulo = $_POST['txtNameType'];
        $id = $_POST['idType'];
        $result = $items->actualizar($id, $articulo);        
        $data['listado'] = $items->formular();
        if ($result) {
            $error= "Insertado exitoso";
        } else {
            $error= "Fallo en el proceso intentelo de nuevo";
        }
        //echo $error;

        $this->view->show("typeProduct.php", $data);
    }//actualozar
    
    public function delete() {
        require 'model/TypeProductModel.php';
        $items=new TypeProductModel();        
        $id = $_POST['idType2'];
        $result = $items->eliminar($id);        
        $data['listado'] = $items->formular();

        $this->view->show("typeProduct.php", $data);
    }//actualozar
    
    public function categoria(){
        require 'model/TypeProductModel.php';
        $items=new TypeProductModel();
        $id = $_POST['idType'];
        $data['listado']= $items->tipar($id);
        $this->view->show("all_product.php", $data);
    } // listar
}
