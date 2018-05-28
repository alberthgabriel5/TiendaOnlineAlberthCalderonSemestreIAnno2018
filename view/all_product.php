<?php
include_once 'public/header.php';
?>

<article>
    <spam><?php
        if (isset($error))
            echo $error;
        ?></spam>  


    <table class="table table-striped table-hover text-center ">

                        
        <label class="col-lg-12 text-center"><h1 class="h1">Todos los Productos</h1></label>
            
       
        <?php
        $count = 0;
        foreach ($vars['listado'] as $key => $value) {
            ?>         
            
                <div class="col-lg-4">    
                    <form action="?controlador=Product&accion=update" method="POST">       

                        <img class="col-lg-12 " alt="Imagen de Producto"  src="<?php echo $value[5]; ?>">                    
                        <input type="hidden" id="idType" name="idType" value='<?php echo $value[0]; ?>'>
                        <label class="label-default col-lg-8 text-center" ><?php echo $value[1]; ?></label>
                        <label class="label-info col-lg-4 text-center" > <?php echo '&cent;'.$value[3]; ?></label>
                        <input class="col-lg-4 btn btn-success text-left" type="submit" id="update" name="update" value="Actualizar" />
                    </form>
                    <form action="?controlador=Product&accion=delete" method="POST">
                        <input type="hidden" id="idType2" name="idType2" value='<?php echo $value[0]; ?>'>
                        <input  class="col-lg-4 btn btn-danger text-left" type="submit" id="delete" name="delete" value="Eliminar" />
                    </form>
                    <form action="?controlador=Product&accion=compra" method="POST">
                        <input type="hidden" id="idType2" name="idType3" value='<?php echo $value[0]; ?>'>
                       <input  class="col-lg-4 btn btn-success text-center" type="submit" id="compra" name="compra" value="Comprar" />
                    </form>
                </div>

            </tr>
            <?php
        }//fin del while
        ?>
    </table>

</article>

<?php
include_once 'public/footer.php';
?>

