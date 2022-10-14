<?php
    require_once "./model/ProductoModel.php";
    require_once "./view/ProductosView.php";
    require_once "./model/CategoriaModel.php";
    require_once "./view/AdminView.php";
    require_once "./helpers/AuthHelper.php";
    
    class ProductosController {

        private $productoModel;
        private $categoriaModel;
        private $view;
        private $authHelper;

        function __construct(){
            $this->productoModel = new ProductoModel();
            $this->categoriaModel = new CategoriaModel();
            $this->view = new ProductosView();
            $this->adminView = new AdminView();
            $this->authHelper = new AuthHelper();
        }

        function showProductos() {
            session_start();
            $producto = $this->productoModel->getProductos();
            $categoria = $this->categoriaModel->getCategorias();
      
            $this->view->showViewProductos($producto, $categoria);
            

        }

       function detailProduct($id_producto){
            session_start();
            $producto = $this->productoModel->getProducto($id_producto);
            $this->view->detailProductoView($producto);

        }
        function detailCategoria($id){
            session_start();
            $productosCategoria = $this->productoModel->getProductoByCategoria($id);
            $categoria = $this->categoriaModel->getCategoriaID($id);
            $this->view->detailCategoriaView($productosCategoria, $categoria);

        }


 
       function createProducto(){
            if ($this->authHelper->checkLogin()){
                $nombre= $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio= $_POST['precio'];
                $categoria= $_POST['id_categoria'];
            
                if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == 
                "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
                    $this->productoModel->inssertProducto($nombre,$descripcion,$precio,$categoria,$_FILES['imagen']['tmp_name']);
                }   
                else{
                    $this->productoModel->inssertProducto($nombre,$descripcion,$precio,$categoria);
                }
                $this->adminView->showAdminLocation();
            }
              
        } 

        
        function createCategoria(){
            if ($this->authHelper->checkLogin()){
                $nombre = $_POST['nombre_categoria'];
                $this->categoriaModel->inssertCategoria($nombre);
                $this->adminView->showAdminLocation();
            }
        }
       
        

       
        function deleteProducto($id_producto){
            if ($this->authHelper->checkLogin()){
                $this->productoModel->deleteProducto($id_producto);
                $this->adminView->showAdminLocation();
            }
        }
      
        function deleteCategoria($id_categoria){
            if ($this->authHelper->checkLogin()){
                //si la id que queres borrar no esta  en la tabla de producto{.....}
                if (empty($this->productoModel->getProductoByCategoria($id_categoria))){
                    $this->categoriaModel->deleteCategoria($id_categoria);
                    $this->adminView->showAdminLocation();
                }
                else{ 
                    $productos = $this->productoModel->getProductosAll();
                    $categorias = $this->categoriaModel->getCategorias();
                    $this->adminView->formularioAdmin($productos, $categorias, "No se puede borrar porque esta siendo usada en productos");
                }
            }
        }             
    

        function formEditarProducto($id_producto){
           
                session_start();
                //mostramos form
                $producto = $this->productoModel->getProducto($id_producto);
                $categoria = $this->categoriaModel->getCategorias();
                $this->view->updateProductoView($categoria, $producto);
            
        }
        
        function formEditarCategoria($id_Categoria){

            session_start();
            $categoria = $this->categoriaModel->getCategoriaID($id_Categoria);
            $this->view->updateCategoriaview($categoria);
        }

        function updateProducto ($id_producto){
            if ($this->authHelper->checkLogin()){

                $nombre= $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio= $_POST['precio'];
                $categoria = $_POST['id_categoria'];
            
            
                if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == 
                "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){

                    $this->productoModel->updateProducto($id_producto,$nombre,$descripcion,$precio,$categoria,$_FILES['imagen']['tmp_name']);

                }
                else{
                    $this->productoModel->updateProducto($id_producto,$nombre,$descripcion,$precio,$categoria); 
                }
                $this->adminView->showAdminLocation();   
            }
        }
        function updateCategoria($id_categoria){
            if ($this->authHelper->checkLogin()){
                
                $this->categoriaModel->updateCategoria($_POST['nombre_categoria'],$id_categoria);
                $this->adminView->showAdminLocation(); 
            
            }
        }

        

    } 
