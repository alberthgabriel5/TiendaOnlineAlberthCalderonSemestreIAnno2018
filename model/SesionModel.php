<?php


/**
 * Description of SesionModel
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class SesionModel {
    //put your code here
    protected $db;
    
    public function __construct() {
        //requerir conexion 
        require 'libs/SPDO.php';
        $this->db= SPDO::singleton();
    }//contructor
    
    function isClient($user, $pass) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbclient where "
                . "userClient = '".$client[0]."' and passwordClient = '".$client[1]."';");
        $row = mysqli_fetch_array($result);
        $id = 0;
        if (sizeof($row) >= 1) {
            $id = $row['idClient'];
        } else {
            $id = -1;
        }
        return $id;
    }
}
