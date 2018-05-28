<?php
    include_once 'public/header.php';
?>

<article>
    <form action="?controlador=Formulario&accion=insertar" method="POST">
        <input type="text"  required name="articulo" id="articulo" value="" placeholder="Agregue el nombre del articulo" />
    <br>
    <input type="submit" value="Agregar" id="Agregar" name="Agregar" />
    <br>
    <spam><?php
        if(isset($error))
            echo $error;
    ?></spam>
    </form>
   
    
    
    <table >
        
            <tr>
                <th>ID</th>
                <th>Item</th>
            </tr>
       <?php
       //print_r($vars['listado']);
       //while($items=$vars['listado']->fetch())
       foreach($vars['listado'] as $key=>$value)
       {
       ?>         
            <tr>
                <td><?php echo $value[0]; ?></td>                
                <td><?php echo $value[1]; ?></td>                
            </tr>
        <?php 
       }//fin del while
       
       ?>
      
    </table>

</article>

<?php
    include_once 'public/footer.php';
?>

