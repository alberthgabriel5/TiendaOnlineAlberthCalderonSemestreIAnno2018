 
<?php
include 'public/header.php';

//        <link href="public/css/Login.css" rel="stylesheet" type="text/css"/>
        ?>

        <div class="container formulario">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4  ">
                    <img src="public/img/user.png" class="logo center-block">
                </div>

            </div>
            <div class=" espaciado">

            </div>
            <div class="row">
                <fieldset class="col-xs-10 col-xs-offset-1">


                    <legend class="hidden-xs">
                        <h3>inicio de sesi&oacute;n</h3>
                    </legend>

                    <form role="form" action="?controlador=Sesion&accion=start" enctype="multipart/form-data" method="POST" class="form-horizontal">

                        <div class="form-group">
                            <label class="col-xs-12" for="usuario"><h4>Usuario o E-mail</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">

                                <input type="text" id="usuario" name="usuario" class="form-control Input">

                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-xs-12" for="password"><h4>Password</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type="password" id="password" name="password" class="form-control col-xs-12 Input">
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger center-block">Aceptar</button>

                        </div>

                    </form>
                </fieldset>

            </div>
        </div>
        <form id="frmLogin" method="POST" action="./Business/loginAction.php">                    

            <label id="txtMessage"></label>
        </form>
        <br><br>
    


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Recuperar contraseña</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Business/RecoverPasswordClientBusiness/RecoverPasswordAction.php">
                        <table>                                
                            <tr>
                                <td>Email:</td>
                                <td>&emsp;&emsp;<input style="width: 400px;"type="email" id="txtEmail" name="txtEmail"/></td>
                            <label id="lblUser">Usuario:&emsp;</label>
                            <input type="text" id="txtUser" name="txtUser"/><br><br>
                            <label id="lblUser">Contraseña:</label>
                            <input type="password" id="txtPassword" name="txtPassword"/><br><br>
                            <input type="submit" id="btnAccept" name="btnAccept" value="Iniciar sesión"/><br>
                            <input type="hidden" id="option" name="option" value="login">
                            </tr>

                        </table><br>
                        <input class="btn btn-primary" type="submit" id="btnSend" value = "Enviar"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    </center>
    <?php
   

//}

include 'public/footer.php';
?>

