
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
    public function registro(){
        $this->view->show("inscribe.php", null);
    }
    public function salir(){
    if(isset($_SESSION['idUser'])){
        $_SESSION['idUser']=0;
        $_SESSION['rol']=0;
        session_destroy();
    }
    //session_start();
    //session_destroy();
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
        $_SESSION['rol'] = 0;
        foreach($items->isClient($user, $pass) as $key=>$value)
       {    
            
            $_SESSION['idUser'] = $value[0];            
            $_SESSION['nick'] = $value[2];            
            $_SESSION['rol'] = $value[5];
       
            /*echo 
            $_SESSION['idUser'] .
            $_SESSION['email'] .
            $_SESSION['nick'] .
            $_SESSION['secure'] .
            $_SESSION['edad'] .
            $_SESSION['rol'];
            */
        }     
        
        
    //header('location: ../index.php');
    $this->view->show("listar.php", null);
    } // listar
}
