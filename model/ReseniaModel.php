<?php   
  class ReseniaModel {
      
      private $db;
    
      function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_begaming;charset=utf8', 'root', '');
      }
      
      public function getAllReseniaByProducto($id = null,$sort = null, $order = null,$limit = null, $offset = null){
        
        if(($sort!= null && $order != null) && ($limit!= null && $offset != null)){
          
            $query = $this->db->prepare("SELECT resenia.*, producto.nombre, producto.descripcion, producto.precio FROM resenia JOIN producto ON resenia.id_producto_fk = producto.id_producto WHERE id_producto_fk = ?  ORDER BY $sort $order LIMIT $limit OFFSET $offset ");
            $query->execute([$id]);
            
        }
        else if($sort!= null && $order != null){
          

          $query = $this->db->prepare("SELECT resenia.*, producto.nombre, producto.descripcion, producto.precio FROM resenia JOIN producto ON resenia.id_producto_fk = producto.id_producto WHERE id_producto_fk = ?  ORDER BY $sort $order ");
          $query->execute([$id]);
        }
        else if($limit!= null && $offset != null){
          
          $query = $this->db->prepare("SELECT resenia.*, producto.nombre, producto.descripcion, producto.precio FROM resenia JOIN producto ON resenia.id_producto_fk = producto.id_producto WHERE id_producto_fk = ?  LIMIT $limit OFFSET $offset ");
          $query->execute([$id]);
        }
        else{
          
          $query = $this->db->prepare("SELECT resenia.*, producto.nombre, producto.descripcion, producto.precio FROM resenia JOIN producto ON resenia.id_producto_fk = producto.id_producto WHERE id_producto_fk = ?");
          $query->execute([$id]);
          
        }
        
        $resenia = $query->fetchAll(PDO::FETCH_OBJ);
        return $resenia;
      }
      
      
  
  
  }
