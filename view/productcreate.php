<?php
include_once 'public/header.php';
$picProduct;
?>


<article>

    <form action="?controlador=Product&accion=addProduct" enctype="multipart/form-data" method="POST">
        <div class="form-group col-lg-6" >
            <input type="text" class=" col-lg-12 input-lg" required name="articulo" id="articulo" value="" placeholder="Agregue el nombre del Producto" />
            <br> <br> <br>  <input type="text" class="col-lg-6 input-lg" required name="precio" id="precio" value="" placeholder="Precio" />
            <br> <br> <br> <select required class="input-lg" name="cbTypeProduct" id="cbTypeProduct" placeholder="Selecione la Categoria">
                <option requiered class="input-lg visible-sm-block" value =""  >Seleccione Categoria<hr></option>
                <?php
                foreach ($vars['listado'] as $key => $value) {
                    ?> 

                    <option class="input-lg " value='<?php echo $value[0]; ?>'><?php echo $value[1]; ?> </option>
    <?php
}
?>
            </select>
            <br> <br> <br>  <input type="text" size="100" class="col-lg-12 input-lg" required name="descripcion" id="descripcion" value="" placeholder="Descripcion" />
            <br><br><br> <div class="uploadBtn"><input id="fileImage0" name="fileImage0"  required accept="image/x-png,image/gif,image/jpeg" type="file"></div>
            <br><br><br> 

            <input class="col-lg-6 btn btn-success btn-lg" type="submit" value="Agregar" id="Agregar" name="Agregar" />
        </div>
        <div class="form-group col-lg-6">            
            <img id="img1" name="img1" class="col-lg-12" src='public/img/picDefault.jpg' alt="Imagen del Producto"  class="img-rounded" />

<spam><?php
if (isset($error))
    echo $error;
?></spam>


        </div>



        
    </form>


</article>

<?php
include_once 'public/footer.php';
?>
