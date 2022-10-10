{include file='templates/header.tpl'}
   
   <div class="productos">
        <div class="lista-categoria">
            <ul>
                {foreach from=$categorias item=$categoria}
                    <li><a href="categoria/{$categoria->id_categoria}">{$categoria->nombre_categoria}</a></li>         
                {/foreach}
            </ul>
        </div>
        
            
            {foreach from=$productos item=$producto}
                <div class="lista-producto">
                    <p> 
                        <span class="nombre-producto">{$producto->nombre}</span>
                        <span class="precio-producto">{$producto->precio}</span>
                    
                    </p>
                    <a href="producto/{$producto->id_producto}">Ver mas</a>
                </div>
            {/foreach}


       
    </div>

{include file='templates/footer.tpl'}