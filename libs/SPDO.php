<?php

/**
 * Description of SPDO
 *
 * @author laboratorios
 */
class SPDO extends PDO{
    //put your code here
    private static $instance = null;
    
    public function __construct() {
        $config= Config::singleton();
        parent::__construct('mysql:host='.$config->get('dbhost').';dbname='.$config->get('dbname'), $config->get('dbuser'), $config->get('dbpass'));
//        parent::__construct('mysql:host='.$config->get('dbhost').';dbname='.$config->get('dbname'), $config->get('dbuser'), $config->get('dbpass'));
        
    }
    
    public static function singleton(){
        if(self::$instance==null){
            self::$instance=new self();
        }//if
        return self::$instance;
    }
}
