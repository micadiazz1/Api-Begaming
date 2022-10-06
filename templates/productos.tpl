{include file='templates/header.tpl'}
    <div class="lista-categoria">
        <ul  class="list-group list-group-flush">
            {foreach from=$categorias item=$categoria}
                <li class="list-group-item"><a href="categoria/{$categoria->id_categoria}">{$categoria->nombre_categoria}</a></li>         
            {/foreach}
        </ul>
    </div>
    <div class= "lista-producto">
        
        {foreach from=$productos item=$producto}
            <div class="producto">
                <p> 
                    <span class="nombre-producto">{$producto->nombre}</span>
                    <span class="precio-producto">{$producto->precio}</span>
                   
                </p>
                <a href="producto/{$producto->id_producto}">Ver mas</a>
            </div>
        {/foreach}


    </div>


{include file='templates/footer.tpl'}