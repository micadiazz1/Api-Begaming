{include file='templates/header.tpl'}

     <h1>{$nombreCategoria} </h1>
    
    <ul>
        {foreach from=$categorias item=$categoria}
            <li> producto:{$categoria->nombre}</li>
            <li> Descripcion:{$categoria->descripcion}</li>
            <li> Precio:{$categoria->precio}</li>
            <img class="imgDetalle" src = "{$categoria->imagen}" >
            <br>  
        {/foreach}    
        <br>
    </ul>
    
           
       

    <a href="productos" class="btn btn-outline-dark">Volver atras</a>

{include file='templates/footer.tpl'}