<?php
    include_once 'public/header.php';
?>

<article>
    <table class="table table-striped table-hover">
        
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
