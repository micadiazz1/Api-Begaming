<?php   
    class ReseniaModel {
       
        private $db;
      
          function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_begaming;charset=utf8', 'root', '');
          }
        
        public function getAllReseniaByProducto($id = null,$sort = null, $order = null){
    
            $query = $this->db->prepare("SELECT resenia.*, producto.nombre, producto.descripcion, producto.precio FROM resenia JOIN producto ON resenia.id_producto_fk = producto.id_producto WHERE id_producto_fk = ?  ORDER BY $sort $order");
            $query->execute([$id]);
            $resenia = $query->fetchAll(PDO::FETCH_OBJ);
            return $resenia;
          
        }
        
        public function getAllResenia($id = null){
            $query = $this->db->prepare("SELECT * from resenia where id_producto_fk = ?");
            $query->execute([$id]);
            $resenia = $query->fetchAll(PDO::FETCH_OBJ);
            return $resenia;
        }
    
    
    }
