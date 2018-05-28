 
<?php
include 'public/header.php';
        if (@session_start() == true) {
            if (isset($_SESSION["idUser"])) {
                ?>
                

                <?php
            } else {
                ?>

                <div>Usuario predeterminado: usuario = user contraseña = user</div>
                <br>
                <form id="frmLogin" method="POST" action="./Business/loginAction.php">
                    <label id="lblUser">Usuario:&emsp;</label>
                    <input type="text" id="txtUser" name="txtUser"/><br><br>
                    <label id="lblUser">Contraseña:</label>
                    <input type="password" id="txtPassword" name="txtPassword"/><br><br>
                    <input type="submit" id="btnAccept" name="btnAccept" value="Iniciar sesión"/><br>
                    <input type="hidden" id="option" name="option" value="login">
                    <label id="txtMessage"></label>
                </form>
                <br><br>
                <?php
            }
        }else{
        ?>

        <!-- Trigger the modal with a button -->
        <button style="border: none;"type="button" data-toggle="modal" data-target="#myModal">¿Olvidó su contraseña?</button>
        <a href="./Presentation/Client/ClientRegister.php">Registrarse</a>

        <!-- Modal -->
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
        }
        
        include 'public/footer.php';
        ?>

