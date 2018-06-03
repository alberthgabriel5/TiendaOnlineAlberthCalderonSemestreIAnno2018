<?php
if (!isset($_SESSION['idUser'])) {
    @session_start();
}
if ($_SESSION['idUser'] == 0) {
    require 'libs/FrontController.php';
    FrontController::main();
}


include_once 'public/header.php';
?>

<article>
<?php
$valorRoll;
                    foreach ($vars['listado'] as $key => $value) {
                        $valorRoll=$value[5];
                    }
                        ?>  

    <?php
    
    
    if ($_SESSION['rol'] == 1 ) {
        if( $_SESSION['idUser'] == -22 && $valorRoll==1) {
        ?>
        <form action="?controlador=User&accion=gestionar" method="POST">
            <div class="form-group col-lg-3">                
                <input type="email" class="form-control" required id="txtEmailUser" name="txtEmailUser" value= '' placeholder="E-mail">
            </div> 
            <div class="col-lg-2 form-group"> 
                <input type="text" class="form-control" requiered id="txtNameUser" required name="txtNameUser" value='' placeholder="Nick">
            </div>
            <div class="col-lg-2 form-group">
                <input type="text" class="col-lg-2 form-control"  id="txtPassUser" name="txtPassUser" value= '' placeholder="password" required>
            </div>                

            <div class="col-lg-2 form-group ">
                <input type="number" class="col-lg-2 form-control" id="txtAgeUser" name="txtAgeUser" value= '' placeholder="Edad" required>
            </div>          
            <div class="col-lg-1 form-group"></div>
            <div class="col-lg-2 form-group">
                <input class="col-lg-3 btn btn-success form-control" type="submit" id="update" name="update" value="Insertar" />
            </div>
        </form>
    <?php
        }
    ?>
    <span>
            <?php
            if (isset($error))
                echo $error;
            ?>
    </span>>

        <br>
        <br>


        <div class="table table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="info"> 
                        <th class="col-lg-2 text-center"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope">&nbsp; Email</i></span></th>
                        <th class="col-lg-2 text-center"><span class="input-group-addon"><i class="glyphicon glyphicon-user">&nbsp; Nick</i></span></th>
                        <th class="col-lg-2 text-center"><span class="input-group-addon"><i class="glyphicon glyphicon-lock">&nbsp;Contraseña </i></span></th>
                        <th class="col-lg-1 text-center"><span class="input-group-addon"><i class="glyphicon glyphicon-stats">&nbsp; Edad</i></span></th>
                        <th class="col-lg-1 text-center"><span class="input-group-addon"><i class="glyphicon glyphicon-check">&nbsp; Activo</i></span></th>
                        <th class="col-lg-2 text-center"><span class="input-group-addon"><i class="glyphicon glyphicon-repeat">&nbsp; Actualizar</i></span></th>
                        <?php if( $_SESSION['idUser'] == -22) {
                            
                       ?>
                        <th class="col-lg-2 text-center"><span class="input-group-addon"><i class="glyphicon glyphicon-remove-sign">&nbsp; Cambiar</i></span></th>
                        <?php                        
                        } 
                        ?>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($vars['listado'] as $key => $value) {
                        ?>  


                    <tr class=""> 
                    <form action="?controlador=User&accion=update" method="POST">          
                        <td class="col-lg-3">
                            <input type="hidden" id="idType" name="idType" value='<?php echo $value[0]; ?>'>
                            <input type="hidden" id="check" name="check" value='<?php echo $value[6]; ?>'>
                            <input type="hidden" id="rol" name="rol" value='<?php echo $value[5]; ?>'>
                            <input type="text" class="form-control" id="txtEmailUser" name="txtEmailUser" value= '<?php echo $value[1]; ?>'>
                        </td> 
                        <td class="col-lg-2 "> 
                            <input type="text" class="form-control" id="txtNameUser" name="txtNameUser" value= '<?php echo $value[2]; ?>'>
                        </td>
                        <td class="col-lg-2 ">
                            <input type="text" class="col-lg-2 form-control" id="txtPassUser" name="txtPassUser" value= '<?php echo $value[3]; ?>'>
                        </td>              
                                                  

                        <td class="col-lg-1 ">
                            <input type="number" class="col-lg-2 form-control" id="txtAgeUser" name="txtAgeUser" value= '<?php echo $value[4]; ?>'>
                        </td>                
                        <td class="col-lg-1">
                            <input type="checkbox" class="col-lg-2 form-control" id="active" name="active"  disabled <?php
                            if ($value[5] == 1) {
                                echo 'checked';
                            }
                            ?>>
                        </td> 

                        <td class="col-lg-2"><input class="col-lg-10 btn btn-success" type="submit" id="update" name="update" value="Actualizar" />&nbsp;</td>
                    </form>
                    <?php
                    if( $_SESSION['idUser'] == -22) {
                    if ($value[0] != -22) {
                        ?>
                        <form action="?controlador=User&accion=delete" method="POST">
                            
                            <input type="hidden" id="idType" name="idType" value='<?php echo $value[0]; ?>'>
                            <input type="hidden" id="txtEmailUser" name="txtEmailUser" value= '<?php echo $value[1]; ?>'>
                            <input type="hidden" id="txtNameUser"  name="txtNameUser" value= '<?php echo $value[2]; ?>'>
                            <input type="hidden" id="txtPassUser" name="txtPassUser" value= '<?php echo $value[3]; ?>'>
                            <input type="hidden" id="txtAgeUser" name="txtAgeUser" value= '<?php echo $value[4]; ?>'>
                            <input type="hidden" id="rol" name="rol" value='<?php echo $value[5]; ?>'>
                            <input type="hidden" id="check" name="check" value='<?php echo $value[6]; ?>'>                     
                            <td class="col-lg-2">
                            <input  class="col-lg-10 btn btn-warning" type="submit" id="delete" name="delete" value="<?php
                            if ($value[6] == 1) {
                                echo 'Desactivar';
                            }else{
                                echo 'Activar';
                            }
                            ?>" />
                            </td>
                        </form>

                        <?php
                    }
                    }
                    ?>
                    </tr>
                    <?php
                }//fin del while
                ?>
                </tbody>
                
            </table>
        </div>
        <?php
    }else if ($_SESSION['rol'] == 2) {
        ?>
        <div class="col-lg-12 center-block">
            <?php
            foreach ($vars['listado'] as $key => $value) {
                ?>            


                <form action="?controlador=User&accion=update" method="POST">
            <div class="form-group col-lg-3">
                <input type="hidden" id="idType" name="idType" value='<?php echo $value[0]; ?>'>
                <input type="hidden" id="rol" name="rol" value='<?php echo $value[5]; ?>'>
                <input type="hidden" id="check" name="check" value='<?php echo $value[6]; ?>'>
                <input type="email" class="form-control" required id="txtEmailUser" name="txtEmailUser" value= '<?php echo $value[1]; ?>' placeholder="E-mail">
            </div> 
            <div class="col-lg-2 form-group"> 
                <input type="text" class="form-control" requiered id="txtNameUser" required name="txtNameUser" value='<?php echo $value[2]; ?>' placeholder="Nick">
            </div>
            <div class="col-lg-2 form-group">
                <input type="text" class="col-lg-2 form-control"  id="txtPassUser" name="txtPassUser" value= '<?php echo $value[3]; ?>' placeholder="password" required>
            </div>                

            <div class="col-lg-2 form-group ">
                <input type="number" class="col-lg-2 form-control" id="txtAgeUser" name="txtAgeUser" value= '<?php echo $value[4]; ?>' placeholder="Edad" required>
            </div>          
            <div class="col-lg-1 form-group"></div>
            <div class="col-lg-2 form-group">
                <input class="col-lg-3 btn btn-success form-control" type="submit" id="update" name="update" value="Actualizar" />
            </div>
        </form>

                <?php
            }
?>
            </div>
            <?php
        }
        ?>

</article>

<?php
include_once 'public/footer.php';
?>
