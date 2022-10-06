<?php
    require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";
    class ProductosView {
        
        private $smarty;

        function __construct(){
          $this->smarty = new Smarty();
        }
        

        function showViewProductos($productos,$categorias){ /* Muestro las dos tablas */
            $this->smarty->assign('productos', $productos);
            $this->smarty->assign('categorias', $categorias);

            $this->smarty->display('templates/productos.tpl');
        }

        function detailProductoView($producto){/* detalle de la tabla poducto */
            $this->smarty->assign('producto', $producto);
            $this->smarty->display('templates/detailproducto.tpl');

        }
        
        // VERIFICAR A VER SI HACER 2 FUNCIONES PA 
        // OJO


        // FIJARTEEE
        function detailCategoriaView($productoCategoria,$categorias){/* detalle de la tabla categoria */
            $this->smarty->assign('nombreCategoria',$categorias->nombre_categoria);
            $this->smarty->assign('categorias', $productoCategoria);
            
            $this->smarty->display('templates/detailCategoria.tpl');
        }


        function updateProductoView($categorias,$id){
            $this->smarty->assign('id', $id);
            
            $this->smarty->assign('categorias', $categorias);
            
            $this->smarty->display('templates/updateProducto.tpl');
            
        }
        function updateCategoriaView($id){
            $this->smarty->assign('id', $id);
           
            $this->smarty->display('templates/updateCategoria.tpl');
            
        }
        

        
       
    }