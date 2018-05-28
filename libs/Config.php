<?php

/**
 * Description of Config
 *
 * @author Nelson
 */
class Config {
    private $vars;
    private static $instance;
    
    private function __construct() {
        $this->vars=array();
    } // constructor privado para usar con singleton
    
    public function set($nombreAtributo, $valor){
        if(!isset($this->vars[$nombreAtributo])){
            $this->vars[$nombreAtributo]=$valor;
        }
    } // set
    
    public function get($nombreAtributo){
        if(isset($this->vars[$nombreAtributo])){
            return $this->vars[$nombreAtributo];
        } // if
    } // get
    
    public static function singleton(){
        if(!isset(self::$instance)){
            $tempClass=__CLASS__;
            self::$instance=new $tempClass;
        } // if
        return self::$instance;
    } // singleton
    
} // fin clase

?>