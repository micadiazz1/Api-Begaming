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
        $resenia = $this->reseniaModel->getAllResenia($id);
        
        $datosArray = [
            "precio",
            "id_resenia",
            "calificacion",
            "resenia"
        ];
        
        if($resenia){
        if(isset($_GET['sort']) && isset($_GET['order'])){
            $sort =strtolower($_GET['sort']);
            $order =strtolower($_GET['order']);
            if(($order == 'asc' || $order  == 'desc') && (in_array($sort, $datosArray))){
            
                $resenia = $this->reseniaModel->getAllReseniaByProducto($id,strtolower($sort),strtolower($order));
                $this->view->response($resenia, 200);
            }
        }
        else{
            $this->view->response("No se pudo interpretar la url", 400);
        }
        }else{
            $this->view->response("No hay reseñas con esa id= $id", 404);
        }
    }

}