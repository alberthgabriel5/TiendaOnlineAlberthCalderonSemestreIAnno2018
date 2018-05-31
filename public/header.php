<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Tienda</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="public/img/icon.ico"/>
        <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="public/css/estilo.css"/>        
        <script src="public/js/jquery-3.3.1.js" ></script>
        <script src="public/js/CargarImagen.js" type="text/javascript"></script>
        <link href="public/css/Login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid" style="width:100%; height:100%; min-height: max-content;}" >
            <div class="container" >

                <div class="row">
                    <div class=" col-lg-12 center-block">  

                        <h1 class="well-lg text-success text-center bg-primary">ALBUR</h1>

                        <nav class="navbar navbar-default">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Inicio</a></li>
                                <?php
                                
                                if (!@session_start() == true){
                                    session_start();
                                }    
                                if(isset($_SESSION['idUser'])&&$_SESSION['rol']==1 )                              
                                    {
                                    ?>

                                    <li ><a href="?controlador=TypeProduct&accion=listar">Categoria</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="?controlador=Product&accion=listar">Productos
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="?controlador=Product&accion=listar">Manejo</a></li>
                                            <li><a href="?controlador=Product&accion=crear">Insertar</a></li>
                                            <!--                                    <li><a href="#">Submenu 1-3</a></li>-->
                                        </ul>
                                    </li>
                                    <li><a href = "?controlador=Sesion&accion=salir">Salir</a></li>
                                    <?php } else if(isset($_SESSION['idUser'])&&$_SESSION['rol']==2) {
                                        ?>
                                    <li ><a href="?controlador=TypeProduct&accion=listar">Categoria</a></li>
                                    <li><a href = "?controlador=Sesion&accion=salir">Salir</a></li>
                                        <?php
                                    }if(!isset($_SESSION['idUser'])||$_SESSION['idUser']==0){
                                        ?>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="?controlador=Product&accion=listar">Ingresar
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href = "?controlador=Sesion&accion=inicio">Ingresar</a></li>
                                            <li><a href = "?controlador=Sesion&accion=registro">Registrar</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                    }
                                    ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!--                        Contenido Principal-->
