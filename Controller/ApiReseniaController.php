<?php
  require_once "./model/ReseniaModel.php";
  require_once "./view/ApiView.php";



class ApiReseniaController {
    private $ReseniaModel;
    private $view;
    

    public function __construct() {
        $this->reseniaModel = new ReseniaModel();
        $this->view = new ApiView();
        
       
    }

    public function getReseniasByProducto($params = null){
        $id = $params[':ID'];
        $resenia = $this->reseniaModel->getAllReseniaByProducto($id);
        $cantidadProductos = count($resenia);

        $datosArray = [
            "precio",
            "id_resenia",
            "calificacion",
            "resenia"
        ];
        
        if($resenia){

            if((isset($_GET['sort']) && isset($_GET['order'])) && (isset($_GET['limit']) && isset($_GET['offset']))){
                $sort =strtolower($_GET['sort']);
                $order =strtolower($_GET['order']);
                if(($order == 'asc' || $order  == 'desc') && (in_array($sort, $datosArray)) && (is_numeric( $_GET['limit'])&& is_numeric($_GET['offset']))){
                    $resenia = $this->reseniaModel->getAllReseniaByProducto($id,strtolower($sort),strtolower($order),$_GET['limit'],$_GET['offset']);
                    $this->view->response($resenia, 200);
                }
                else{
                    $this->view->response("No se pudo interpretar esa url", 400);
                   
                }
            }
            else if(isset($_GET['sort']) && isset($_GET['order'])){
                $sort =strtolower($_GET['sort']);
                $order =strtolower($_GET['order']);
                if(($order == 'asc' || $order  == 'desc') && (in_array($sort, $datosArray))){
                $resenia = $this->reseniaModel->getAllReseniaByProducto($id,strtolower($sort),strtolower($order),null,null);
                $this->view->response($resenia, 200);
                }
                else{
                    $this->view->response("No se pudo interpretar esa url", 400);
                   
                }
            }
            else if(isset($_GET['limit']) && isset($_GET['offset'])){
            
                if((is_numeric($_GET['limit'])&& is_numeric($_GET['offset'])) && (($_GET['offset'])<$cantidadProductos)){
                    $resenia = $this->reseniaModel->getAllReseniaByProducto($id,null,null,$_GET['limit'],$_GET['offset']);
                    $this->view->response($resenia,200);
                }
                else{
                    $this->view->response("No se pudo interpretar esa url", 400);
                   
                }
            }
            else{
                $resenia = $this->reseniaModel->getAllReseniaByProducto($id);
                $this->view->response($resenia, 200);
            }
        
        }
        else{
            $this->view->response("No hay reseñas con esa id= $id", 404);
        }
    }

}