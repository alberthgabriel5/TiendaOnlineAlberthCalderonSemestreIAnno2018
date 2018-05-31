<?php
    include_once 'public/header.php';
    
?>

<article> 
    <div class="col-lg-12 center-block">
        <label class="label-info" lang="es">  <?php  if(isset($_SESSION['nick'])){echo 'Bienvenido '.$_SESSION['nick'];}
        ?>
  </label>
        
        <div class="col-lg-3"></div>        
        <img class="col-lg-5 center-block" src="public/img/11macmccardle-cityinamagnifyingglass.jpg" alt=""/>
        <div class="col-lg-3"></div>
    </div>
    
</article>

<?php
    include_once 'public/footer.php';
?>
