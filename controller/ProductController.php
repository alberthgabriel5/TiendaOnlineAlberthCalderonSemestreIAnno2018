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
    
    public function update() {
        require_once 'model/ProductModel.php';
        $productos = new ProductModel();
        $id = $_POST['idType'];
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
        $result = $productos->actualizar($id,$articulo , $categoria, $precio,  $descripcion,$path);
        $data['listado'] = $this->productos->allproducts();
        $this->view->show("all_product.php", $data); //falta cambiar
    }//actualozar
    
    public function delete() {
        require_once 'model/ProductModel.php';
        $items = new ProductModel();
        $id = $_POST['idType2'];
        echo ''.$_POST['idType2'];
        $result = $items->eliminar($id);        
       $data['listado'] = $items->allproducts();
        $this->view->show("all_product.php", $data); //falta cambiar
    }//actualozar

}
