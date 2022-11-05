<?php
   
   class ReseniaModel {
       
        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_begaming;charset=utf8', 'root', '');
        }

        function getAllResenia($sort = null, $order = null){ 
            //muestro todos los productos
            if($order == 'asc'){
            $query = $this->db->prepare("SELECT * from resenia ORDER BY $sort ASC");
            $query->execute();
            
            $resenia = $query->fetchAll(PDO::FETCH_OBJ);

            return $resenia;
            }else{

                return array();
            }
        }
    
    
    }