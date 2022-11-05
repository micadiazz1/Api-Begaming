<?php
  require_once "./model/ProductoModel.php";
  require_once "./view/ApiView.php";
  require_once "./model/ReseniaModel.php";


class ApiController {
    private $productoModel;
    private $view;
    private $reseniaModel;
    private $data;

        public function __construct() {
            $this->productoModel = new ProductoModel();
            $this->view = new ApiView();
            $this->reseniaModel = new ReseniaModel();
            // lee el body del request
            $this->data = file_get_contents("php://input");
        }

        private function getData() {
            return json_decode($this->data);
        }

        public function getProductos($params = null) {
            $tasks = $this->productoModel->getProductos();
            $this->view->response($tasks);
        }

        public function getProducto($params = null) {
            // obtengo el id del arreglo de params
            $id = $params[':ID'];
            $task = $this->productoModel->getProducto($id);

            // si no existe devuelvo 404
            if ($task)
                $this->view->response($task);
            else 
                $this->view->response("El producto con el id= $id no existe", 404);
        }

        public function deleteProducto($params = null) {
            $id = $params[':ID'];

            $producto = $this->productoModel->getProducto($id);
            if ($producto) {
                $this->productoModel->deleteProducto($id);
                $this->view->response($producto);
            } else 
                $this->view->response("El producto con el id= $id no existe", 404);
        }

        public function insertProducto($params = null) {
            $producto = $this->getData();

            if (empty($producto->nombre) || empty($producto->descripcion) || empty($producto->precio) 
                || empty($producto->id_categoria_fk)) {
                $this->view->response("Complete los datos", 400);
            }
            else{

                $id = $this->productoModel->inssertProducto($producto->nombre, $producto->descripcion, $producto->precio,$producto->id_categoria_fk, $producto->imagen);

                $producto = $this->productoModel->getProducto($id);
                
                $this->view->response($producto, 201);
            
            }
                
                
        }

        public function getResenia($sort = null){
           
            if(!isset($_GET['sort']) || !isset($_GET['order'])){
                $this->view->response("pone bien la url capo", 400);
            }
            else if(!empty( $this->reseniModel->getAllResenia($_GET['sort'],$_GET['order']))){
                $resenia = $this->reseniModel->getAllResenia($_GET['sort'],$_GET['order']);
                $this->view->response($resenia, 201);
            }


        }
    }


