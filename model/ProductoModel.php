<?php
   
   class ProductoModel {
       
       private $db;

        function __construct(){
          $this->db = new PDO('mysql:host=localhost;'.'dbname=db_begaming;charset=utf8', 'root', '');
        }
        function getProductos(){ 
           //muestro todos los productos
           $query = $this->db->prepare('SELECT * from producto');
           $query->execute();
           
           $product = $query->fetchAll(PDO::FETCH_OBJ);
   
           return $product;
                   
        }
    
      

        function  getProducto($id){
           //MUESTRO EL DETALLE  entre las dos tablas DE UN SOLO PRODUCTO
           $query = $this->db->prepare('SELECT producto.*, categoria.nombre_categoria FROM producto INNER JOIN categoria ON producto.id_categoria_fk = categoria.id_categoria WHERE id_producto = ?');
           $query->execute([$id]);
           $detailProduct = $query->fetch(PDO::FETCH_OBJ);
       
           return $detailProduct;
           
       
        }


       /** hago un inner join entre podructo agarrando TODO lo comun entre las dos tablas */
        function getProductosAll(){ 
            //muestro todos los productos
            $query = $this->db->prepare( 'SELECT producto.*, categoria.nombre_categoria FROM producto INNER JOIN categoria on producto.id_categoria_fk = categoria.id_categoria');
            $query->execute();
            $productos = $query->fetchAll(PDO::FETCH_OBJ);

            return $productos;
       
        }
       
       function inssertProducto($nombre, $descripcion, $precio, $categoria,$imagen){
           
                $query = $this->db->prepare('INSERT INTO producto(nombre, descripcion, precio, id_categoria_fk, imagen)  VALUES(?, ?, ?,?, ?)');
                $query->execute([$nombre, $descripcion, $precio, $categoria, $imagen]);
                return $this->db->lastInsertId();

               
       }

       



       function deleteProducto($id_producto){
            $query = $this->db->prepare('DELETE FROM producto WHERE id_producto=?');
            $query->execute([$id_producto]);
       }

      
   }
        
       