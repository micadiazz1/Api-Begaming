<?php
   
class ProductoModel {
       
  private $db;

    function __construct(){
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_begaming;charset=utf8', 'root', '');
    }
    function getProductos($limit = null, $offset = null){ 
        //muestro todos los productos
        if($limit!= null && $offset != null){
        $query = $this->db->prepare("SELECT id_producto, nombre, descripcion, precio, id_categoria_fk FROM producto LIMIT $limit OFFSET $offset ");
        $query->execute();
        }
        else{
          $query = $this->db->prepare("SELECT id_producto, nombre, descripcion, precio, id_categoria_fk FROM producto  ");
          $query->execute();
        }
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;
       
                
    }


    function  getProducto($id){
        //MUESTRO EL DETALLE  entre las dos tablas DE UN SOLO PRODUCTO
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
        
       