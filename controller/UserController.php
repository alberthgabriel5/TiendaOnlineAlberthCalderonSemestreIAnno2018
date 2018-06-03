<?php
/**
 * Description of UserController
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class UserController {
    private $view;
    
    public function __construct() {
        $this->view=new View();
        if(!isset($_SESSION['idUser'])){
        session_start();
    }
        
    } // constructor
    
    
    public function listar(){
        require 'model/UserModel.php';
        $items=new UserModel();
        $data['listado']= $items->listar();
        $this->view->show("editUser.php", $data);
    } // listar
    public function formular(){
        require 'model/UserModel.php';
        $items=new UserModel();
        if( $_SESSION['idUser'] == -22) {
        $data['listado']= $items->formular();
        }else{
            $data['listado']= $items->select($_SESSION['idUser']);
        }
        $this->view->show("editUser.php", $data);
    } // listar
    
    public function gestionar() {
        require 'model/UserModel.php';
        $items=new UserModel();        
        $email = $_POST['txtEmailUser'];
        $nick = $_POST['txtNameUser'];
        $secure = $_POST['txtPassUser'];
        $age = $_POST['txtAgeUser'];
        $rol=1;

        $result = $items->insertar($email,$nick,$secure,$age,$rol);
        if ($result) {
            $error= "Insertado exitoso";
        } else {
            $error= "Fallo en el proceso intentelo de nuevo";
        }
        echo $email.$nick.$secure.$age.$rol;
        echo $error;
        $data['listado']= $items->formular();
        $this->view->show("editUser.php", $data);
    }
    public function insertar() {
        require 'model/UserModel.php';
        $items=new UserModel();        
        $email = $_POST['txtEmailUser'];
        $nick = $_POST['txtNameUser'];
        $secure = $_POST['txtPassUser'];
        $age = $_POST['txtAgeUser'];
        $rol =2;

        $result = $items->insertar($email,$nick,$secure,$age,$rol);
        if ($result) {
            $error= "Insertado exitoso";
        } else {
            $error= "Fallo en el proceso intentelo de nuevo";
        }
        $data['listado']= $items->formular();
        $this->view->show("editUser.php", $data);
    }
    public function registrar() {
        require 'model/UserModel.php';
        $items=new UserModel();        
        $email = $_POST['txtEmailUser'];
        $nick = $_POST['txtNameUser'];
        $secure = $_POST['txtPassUser'];
        $age = $_POST['txtAgeUser'];
        $rol =2;

        $result = $items->insertar($email,$nick,$secure,$age,$rol);
        if ($result) {
            $error= "Insertado exitoso";
        } else {
            $error= "Fallo en el proceso intentelo de nuevo";
        }
        
        $this->view->show("inscribe.php", $error);
    }
    
    public function update() {
        require 'model/UserModel.php';
        $items=new UserModel(); 
        $id = $_POST['idType'];
        $email = $_POST['txtEmailUser'];
        $nick = $_POST['txtNameUser'];
        $secure = $_POST['txtPassUser'];
        $age = $_POST['txtAgeUser'];
        $rol=$_POST['rol'];                
        $active = $_POST['check'];
        $result = $items->actualizar($id, $email,$nick,$secure,$age,$rol,$active);        
        
        if ($result) {
            $error= "Actualizado exitoso";
        } else {
            $error= "Fallo en el proceso intentelo de nuevo";
        }
        
        if (  $_SESSION['rol'] == 1 && $_POST['rol'] == 1) {
            if ($_SESSION['idUser'] == -22) {
                $data['listado'] = $items->formular();
            }else{
               $data['listado']= $items->select($_SESSION['idUser']); 
            }
        }
        else if ($_SESSION['rol'] == 1 && $_POST['rol'] == 2 ){
            $data['listado']= $items->listar();
        }else{
            $data['listado']= $items->select($_SESSION['idUser']);
        }
        $this->view->show("editUser.php", $data);
    }//actualozar
    
    public function delete() {
        require 'model/UserModel.php';
        $items=new UserModel(); 
        $id = $_POST['idType'];
        $email = $_POST['txtEmailUser'];
        $nick = $_POST['txtNameUser'];
        $secure = $_POST['txtPassUser'];
        $age = $_POST['txtageUser'];
        $rol=$_POST['rol'];                 
        $active = ($_POST['check']==1)?'0':'1';
        
        $result = $items->actualizar($id, $email,$nick,$secure,$age,$rol,$active);        
        $data['listado'] = $items->formular();
        if ($result) {
            $error= "Actualizado exitoso";
        } else {
            $error= "Fallo en el proceso intentelo de nuevo";
        }
        if( $_SESSION['idUser'] == -22) {
        $data['listado']= $items->formular();
        }else{
            $data['listado']= $items->select($_SESSION['idUser']);
        }
        $this->view->show("editUser.php", $data);
    }//actualozar
    
}

