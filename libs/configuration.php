<?php
    require 'libs/Config.php';
    $config=Config::singleton();
    $config->set('controllerFolder', 'controller/');
    $config->set('modelFolder', 'model/');
    $config->set('viewFolder', 'view/');
    
    $config->set('dbhost', 'localhost:3307');
    $config->set('dbname', 'tiendaonline');
    $config->set('dbuser', 'root');
    $config->set('dbpass', '');
    $config->set('dbport', '3307');

?>

