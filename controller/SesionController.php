<?php

class SesionController {    
    
    private $view;
    
    public function __construct() {
        $this->view=new View();
        session_start();
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
    //session_destroy();
    //header('location: ../index.php');
    $this->view->show("login.php", null);
    } // listar
    
    public function start() {
        //session_start();
        require 'model/SesionModel.php';
        $items = new SesionModel();
        $user=$_POST['usuario'];
        $pass=$_POST['password'];
        $_SESSION['idUser'] = 0;
        foreach($items->isClient($user, $pass) as $key=>$value)
       {    
            
            $_SESSION['idUser'] = $value[0];
            $_SESSION['email'] = $value[1];
            $_SESSION['nick'] = $value[2];
            $_SESSION['secure'] = $value[3];
            $_SESSION['gender'] = $value[4];
            $_SESSION['edad'] = $value[5];
            $_SESSION['rol'] = $value[6];
       
            echo 
            $_SESSION['idUser'] .
            $_SESSION['email'] .
            $_SESSION['nick'] .
            $_SESSION['secure'] .
            $_SESSION['gender'] .
            $_SESSION['edad'] .
            $_SESSION['rol'];
            
        }     
        
        
    //header('location: ../index.php');
    $this->view->show("listar.php", null);
    } // listar
}
