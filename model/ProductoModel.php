<?php
   
class ProductoModel {
       
  private $db;

    function __construct(){
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_begaming;charset=utf8', 'root', '');
    }
    function getProductos(){ 
      
        $query = $this->db->prepare("SELECT id_producto, nombre, descripcion, precio, id_categoria_fk FROM producto");
        $query->execute();
        
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;
       
                
    }


    function  getProducto($id){
        
        $query = $this->db->prepare('SELECT producto.nombre, producto.descripcion, producto.precio, producto.id_categoria_fk, categoria.nombre_categoria FROM producto  JOIN categoria ON  producto.id_categoria_fk = categoria.id_categoria WHERE id_producto = ?');
        $query->execute([$id]);
        $detailProduct = $query->fetch(PDO::FETCH_OBJ);
    
        return $detailProduct;
          
    
    }
    
    function inssertProducto($nombre, $descripcion, $precio, $categoria){

        $query = $this->db->prepare('INSERT INTO producto(nombre, descripcion, precio, id_categoria_fk)  VALUES(?, ?, ?,?)');
        $query->execute([$nombre, $descripcion, $precio, $categoria]);
        return $this->db->lastInsertId();   
    }


    function deleteProducto($id_producto){
        $query = $this->db->prepare('DELETE FROM producto WHERE id_producto=?');
        $query->execute([$id_producto]);
    }

  
      
}
        
       