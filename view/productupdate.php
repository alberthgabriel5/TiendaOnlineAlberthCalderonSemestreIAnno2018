<?php
include_once 'public/header.php';
$picProduct;
?>


<article>

    <form action="?controlador=Product&accion=update"  method="POST">
        <div class="form-group col-lg-6" >
            <input type="hidden" name="idType" id="idType" value="<?php echo $_SESSION['id']; ?>" />
            
            <input type="text" class=" col-lg-12 input-lg" required name="articulo" id="articulo" value="<?php echo $_SESSION['name']; ?>" placeholder="Agregue el nombre del Producto" />
            <br> <br> <br>  <input type="number" class="col-lg-6 input-lg" required name="precio" id="precio" value="<?php echo $_SESSION['price']; ?>" placeholder="Precio" />
            <br> <br> <br> <select required class="input-lg" name="cbTypeProduct" id="cbTypeProduct" placeholder="Selecione la Categoria">
                <option requiered class="input-lg visible-sm-block" value =""  >Seleccione Categoria<hr></option>
                <?php
                foreach ($vars['listado'] as $key => $value) {
                    ?> 

                    <option class="input-lg " value='<?php echo $value[0]; ?>' 
                        <?php if($value[0]==$_SESSION['category']){
                             echo 'selected';
                        }?>
                            ><?php echo $value[1]; ?> </option>
                    <?php
                }
                ?>
            </select>
            <br> <br>  
            <input type="text" size="100" class="col-lg-12 input-lg" required name="descripcion" id="descripcion" value="<?php echo $_SESSION['description']; ?>" placeholder="Descripcion" />
            <br><br><br> 
            
            <input class="col-lg-6 btn btn-success btn-lg" type="submit" value="Actualizar" id="Agregar" name="Agregar" />
        </div>
        <div class="form-group col-lg-5 center-block">            
            <img id="img1" name="img1" class="col-lg-10 img-rounded" src='<?php echo $_SESSION['pic']; ?>' alt="Imagen del Producto" />

            <spam>
                <?php
                if (isset($error))
                    echo $error;
                ?>
            </spam>
        </div>
    </form>
</article>

<?php
include_once 'public/footer.php';
?>
