<?php

/**
 * Description of ProductController
 *
 * @author "Alberth Calderón Alvarado" <albert.calderon@ucr.ac.cr>
 */
class ProductController {

    private $view;
    private $categoria;
    private $productos;

    public function __construct() {
        $this->view = new View();
        if(!isset($_SESSION['idUser'])){
        session_start();
    }
        
    }

// constructor

    public function listar() {
        require_once 'model/ProductModel.php';
        $this->productos = new ProductModel();
        $data['listado'] = $this->productos->allproducts();
        $this->view->show("all_product.php", $data); //falta cambiar
    }

// listar

    public function crear() {
        require_once 'model/TypeProductModel.php';
        $this->categoria = new TypeProductModel();
        $data['listado'] = $this->categoria->formular();
        $this->view->show("productcreate.php", $data);
    }

// crear

    public function addProduct() {
        require_once 'model/ProductModel.php';
        $productos = new ProductModel();
        $articulo = $_POST['articulo'];
        $precio = $_POST['precio'];
        $categoria = $_POST['cbTypeProduct'];
        $descripcion = $_POST['descripcion']; 
         
        $fileImage = 'fileImage0';        
        $path = "imagenes_/" . basename($_FILES[$fileImage]['name']);    
        
        if (move_uploaded_file($_FILES[$fileImage]["tmp_name"], $path)) {
            $error = "El fichero es válido y se subió con éxito.\n";
        } else {
            $error = "¡Posible error de subida de ficheros o de Permisos de Carpeta Origen y Destino!<br>";
        }
//    print_r($_FILES); 
        $result = $productos->addProduct($articulo , $categoria, $precio,  $descripcion,$path);
        $data['listado'] = $productos->formularCategoria();
        $this->view->show("productcreate.php", $data);
        //header('location: index.php?controlador=Product&accion=crear');
        
    }//addproduct
    
    public function actualizar() {
        require_once 'model/ProductModel.php';
        $id = $_POST['idType'];
        $producto = new ProductModel();
        
        foreach($producto->aproduct($id) as $key=>$value)
       {  
            $_SESSION['id'] = $value[0];            
            $_SESSION['name'] = $value[1];            
            $_SESSION['category'] = $value[2];
            $_SESSION['price'] = $value[3];
            $_SESSION['description'] = $value[4];
            $_SESSION['pic'] = $value[5];            
        }       
        
        $data['listado'] = $producto->formularCategoria();
        $this->view->show("productupdate.php", $data);
        
        
        
        
        
        //$this->view->show("all_product.php", $data); //falta cambiar
        
    }
    public function update() {
        require_once 'model/ProductModel.php';
        $productos = new ProductModel();
        $id = $_POST['idType'];
        $articulo = $_POST['articulo'];
        $precio = $_POST['precio'];
        $categoria = $_POST['cbTypeProduct'];
        $descripcion = $_POST['descripcion'];              
            
        
        $result = $productos->actualizar($id,$articulo , $categoria, $precio,$descripcion);
        if($result){
            echo $id,$articulo , $categoria, $precio,  $descripcion;
           $data['listado'] = $productos->allproducts();
        $this->view->show("all_product.php", $data); //falta cambiar 
        }else{
            $data['listado'] = $producto->formularCategoria();
        $this->view->show("productupdate.php", $data);
        
        }
        
        
        
    }//actualozar
    
    public function delete() {
        require_once 'model/ProductModel.php';
        $items = new ProductModel();
        $id = $_POST['idType'];
//        echo ''.$_POST['idType'];
        $result = $items->eliminar($id);
        
       $data['listado'] = $items->allproducts();
        $this->view->show("all_product.php", $data); //falta cambiar
       
    }//actualozar

}
