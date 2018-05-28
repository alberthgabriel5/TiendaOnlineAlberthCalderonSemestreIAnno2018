<?php

/**
 * Description of SesionController
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class SesionController {
   
    
    
    private $view;
    
    public function __construct() {
        $this->view=new View();
    } // constructor
    
    
    public function inicio(){
//        require '../model/SesionModel.php';
//        $items=new SesionModel();
        $this->view->show("login.php", null);
    } // listar
    
    public function salir(){
    $_SESSION['idUser'] = 0;
    session_start();
    session_destroy();
    //header('location: ../index.php');
    $this->view->show("login.php", null);
    } // listar
}
