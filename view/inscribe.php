<?php
include 'public/header.php';

        ?>
<div class="form-group center-block">
        <form action="?controlador=User&accion=registrar" method="POST">
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
<span>
    <?php
            if (isset($error))
                echo $error;
            ?>
</span>
<?php
    
    include_once 'public/footer.php';
