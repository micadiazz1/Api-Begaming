<?php
  require_once "./model/ProductoModel.php";
  require_once "./view/ApiView.php";



class ApiProductoController {
    private $productoModel;
    private $view;
    private $data;

    public function __construct() {
        $this->productoModel = new ProductoModel();
        $this->view = new ApiView();

        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getProductos( ) { 

        $producto = $this->productoModel->getProductos();
        $this->view->response($producto,200);
    
    }


    public function getProducto($params = null) {
        
        $id = $params[':ID'];
        $producto = $this->productoModel->getProducto($id);

        
        if ($producto)
            $this->view->response($producto);
        else 
            $this->view->response("El producto con el id= $id no existe", 404);
    }

    public function deleteProducto($params = null) {
        $id = $params[':ID'];

        $producto = $this->productoModel->getProducto($id);
        if ($producto) {
            $this->productoModel->deleteProducto($id);
            $this->view->response($producto);
        } else {
            $this->view->response("El producto con el id= $id no existe", 404);
        }
    }

    public function insertProducto($params = null) {
        $producto = $this->getData();

        if (empty($producto->nombre) || empty($producto->descripcion) || empty($producto->precio) 
            || empty($producto->id_categoria_fk)) {
            $this->view->response("Complete los datos", 400);
        }
        else{
                
            $id = $this->productoModel->inssertProducto($producto->nombre, $producto->descripcion, $producto->precio,$producto->id_categoria_fk);
            
            $producto = $this->productoModel->getProducto($id);
            
            $this->view->response($producto, 201);
        
        }     
    }

    
}


