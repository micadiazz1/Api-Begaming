{include file='templates/header.tpl'}

     <h1>{$nombreCategoria} </h1>
    
    <ul>
        {foreach from=$categorias item=$categoria}
            <li> producto:{$categoria->nombre}</li>
            <li> Descripcion:{$categoria->descripcion}</li>
            <li> Precio:{$categoria->precio}</li>
        {/foreach}
    </ul>
    
           
       

    <a href="productos">Volver atras</a>

{include file='templates/footer.tpl'}