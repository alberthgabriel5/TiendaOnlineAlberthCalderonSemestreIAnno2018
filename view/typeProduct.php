<?php
include_once 'public/header.php';
?>

<article>


    <?php
    if ($_SESSION['rol'] == 1) {
        ?>
        <form action="?controlador=typeProduct&accion=insertar" method="POST">
            <input type="text" class="col-lg-6 text-center center-block input-lg" required name="articulo" id="articulo" value="" placeholder="Agregue el Nombre de la Categoria Nueva" />
            <a class="col-lg-1"></a>
            <input class="col-lg-2 btn btn-success btn-lg" type="submit" value="Agregar" id="Agregar" name="Agregar" />
            <br>
            <spam><?php
                if (isset($error))
                    echo $error;
                ?></spam>
        </form>
        <br>
        <br>



        <table class="table  table-hover text-center ">

            <tr class="bg-info">                
                <th class="col-lg-6 text-center">Item</th>
                <th class="col-lg-2 text-center">Actualizar</th>
                <th class="col-lg-2 text-center">Desactivar</th>
                <!--<th class="col-lg-2 text-center">Mostrar</th>-->
            </tr>
            <?php
            foreach ($vars['listado'] as $key => $value) {
                ?>  


                <tr> 
                <form action="?controlador=typeProduct&accion=update" method="POST">          
                    <td class="col-lg-6 ">
                        <input type="hidden" id="idType" name="idType" value='<?php echo $value[0]; ?>'>
                        <input type="text" class="col-lg-12 form-control" id="txtNameType" name="txtNameType" value= '<?php echo $value[1]; ?>'>
                    </td>                
                    <td class="col-lg-2"><input class="col-lg-10 btn btn-success" type="submit" id="update" name="update" value="Actualizar" />&nbsp;</td>
                </form>
                <form action="?controlador=typeProduct&accion=delete" method="POST">
                    <input type="hidden" id="idType2" name="idType2" value='<?php echo $value[0]; ?>'>
                    <td class="col-lg-2"><input  class="col-lg-10 btn btn-warning" type="submit" id="delete" name="delete" value="Desactivar" /></td>
                </form>


                </tr>
        <?php
    }//fin del while
    ?>
            <spam><?php
            if (isset($error))
                echo $error;
            ?></spam>
        </table>
                <?php
            }else if ($_SESSION['rol'] == 2) {
                ?>
        <div class="col-lg-12 center-block">
        <?php
        foreach ($vars['listado'] as $key => $value) {
            ?>            


                <form action="?controlador=typeProduct&accion=categoria" method="POST">
                    <input type="hidden" id="idType" name="idType" value='<?php echo $value[0]; ?>'>
                    <div class="col-lg-2"> <input  class="col-lg-10 btn btn-info" type="submit" id="delete" name="delete" value=<?php echo $value[1]; ?> /></div>
                    
                </form>

        <?php
    }

    echo'</div>';
}
?>

</article>

        <?php
        include_once 'public/footer.php';
        ?>
