{include file='templates/header.tpl'}
    
    <h1> {$producto->nombre_categoria} </h1>
    
    <ul>
        <li> nombre: {$producto->nombre} </li>
        <li> Descripcion: {$producto->descripcion} </li>
        <li> Precio: {$producto->precio}</li>
        
         
    </ul>
     {if isset($producto->imagen)}
        <img class="imgDetalle"src="{$producto->imagen}"/>
    {/if}

    
    <a href="productos" class="btn btn-outline-dark">Volver atras</a>

{include file='templates/footer.tpl'}