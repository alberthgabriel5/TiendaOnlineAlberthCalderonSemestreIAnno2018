<?php

    class FrontController{
        
        static function main(){
            require 'libs/View.php';
            require 'libs/configuration.php';
            
            if(!empty($_GET['controlador']))
                $controllerName=$_GET['controlador'].'Controller';
            else 
                $controllerName='ItemsController'; // se carga el controlador por default que necesitemos
        
            if(!empty($_GET['accion']))
                $nombreAccion=$_GET['accion'];
            else
                $nombreAccion='listar'; // accion a ejecutar por default
            
            $rutaControlador=$config->get('controllerFolder').$controllerName.'.php';
            
            if(is_file($rutaControlador))
                require $rutaControlador;
            else
                die ('Controlador no encontrado - 404 not fount');
            
            if(is_callable(array($controllerName, $nombreAccion))==FALSE){
                trigger_error($controllerName.'-> '.$nombreAccion.' no existe', E_USER_NOTICE);
                return FALSE;
            }
            $controller=new $controllerName();
            $controller->$nombreAccion();
        } // main
        
    } // clase

?>

