<?php
/**
 * Description of FormularioController
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class FormularioController {
    private $view;
    
    public function __construct() {
        $this->view=new View();
    } // constructor
    
    
    public function formular(){
        require 'model/FormularioModel.php';
        $items=new FormularioModel();
        $data['listado']= $items->formular();

        $this->view->show("formulario.php", $data);
    } // listar
    
    public function insertar() {
        require 'model/FormularioModel.php';
        $items = new FormularioModel();
        $articulo = $_POST['articulo'];

        $result = $items->insertar($articulo);
        if ($result) {
            $error= "Insertado exitoso";
        } else {
            $error= "Fallo en el proceso intentelo de nuevo";
        }
        $data['listado'] = $items->formular();

        $this->view->show("formulario.php", $data);
    }

// listar
}
