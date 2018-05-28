<?php

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
    if(isset($_SESSION['idUser'])){
        $_SESSION['idUser']=0;
        session_destroy();
    }
    session_start();
    session_destroy();
    //header('location: ../index.php');
    $this->view->show("login.php", null);
    } // listar
}
