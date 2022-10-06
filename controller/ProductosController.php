<?php
    require_once "./model/ProductoModel.php";
    require_once "./view/ProductosView.php";
    require_once "./model/CategoriaModel.php";
    require_once "./view/AdminView.php";

    class ProductosController {

        private $productoModel;
        private $categoriaModel;
        private $view;
       

        function __construct(){
            $this->productoModel = new ProductoModel();
            $this->categoriaModel = new CategoriaModel();
            $this->view = new ProductosView();
            $this->adminView = new AdminView();
         
        }
        function showProductos() {
            
            $producto = $this->productoModel->getProductos();
            $categoria = $this->categoriaModel->getCategorias();
      
            $this->view->showViewProductos($producto, $categoria);
            

        }

       function detailProduct($id_producto){
            
            $producto = $this->productoModel->getProducto($id_producto);
            $this->view->detailProductoView($producto);

        }
        function detailCategoria($id){
            
            $productosCategoria = $this->categoriaModel->getCategoria($id);
            $categoria = $this->categoriaModel->getCategoriaID($id);
            $this->view->detailCategoriaView($productosCategoria, $categoria);

        }


 
       function createProducto(){
           $nombre= $_POST['nombre'];
           $descripcion = $_POST['descripcion'];
           $precio= $_POST['precio'];
           $categoria= $_POST['id_categoria'];
            $this->productoModel->inssertProducto($nombre,$descripcion,$precio,$categoria);
            $this->adminView->showAdminLocation();
        } 

        
        function createCategoria(){

            $nombre = $_POST['nombre_categoria'];
            $this->categoriaModel->inssertCategoria($nombre);
            $this->adminView->showAdminLocation();
        }
       
        

       
        function deleteProducto($id_producto){
            $this->productoModel->deleteProducto($id_producto);
            $this->adminView->showAdminLocation();
        }
      
        function deleteCategoria($id_categoria){
            $this->categoriaModel->deleteCategoria($id_categoria);
            $this->adminView->showAdminLocation();
        } 
    

        function formEditarProducto($id_producto){
            
            //mostramos form
            $this->productoModel->getProducto($id_producto);
            $categoria = $this->categoriaModel->getCategorias();
            $this->view->updateProductoView($categoria, $id_producto);
        }
        function formEditarCategoria($id_Categoria){
            
            $this->categoriaModel->getCategoria($id_Categoria);
            $this->view->updateCategoriaview($id_Categoria);
        }  
         function updateProducto ($id_producto){
            
            $this->productoModel->updateProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'], $_POST['id_categoria'],$id_producto);   
            $this->adminView->showAdminLocation();   
        }
       function updateCategoria($id_categoria){
            $this->categoriaModel->updateCategoria($_POST['nombre_categoria'],$id_categoria);
            $this->adminView->showAdminLocation(); 
        }

        

    } 
