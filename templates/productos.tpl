{include file='templates/header.tpl'}
   
   <div class="productos">
        <div class="lista-categoria">
            <ul class="list-group">
                {foreach from=$categorias item=$categoria}
                    <li class="list-group-item"><a href="categoria/{$categoria->id_categoria}">{$categoria->nombre_categoria}</a></li>         
                {/foreach}
            </ul>
        </div>
        
             <div class="container-producto">
                {foreach from=$productos item=$producto}
                    <div class="lista-producto">
                        <p> 
                            <span class="nombre-producto">{$producto->nombre}</span>
                            <span class="precio-producto">{$producto->precio}</span>
                            
                        
                        </p>
                        {if isset($producto->imagen)}
                            <img class="imgProductos" src="{$producto->imagen}"/>
        
                            
                        {/if} 
                        <a href="producto/{$producto->id_producto}" class="btn btn-outline-info verMas">Ver mas</a>
                        
                   
                    </div>
                {/foreach}
             </div>
    </div>

{include file='templates/footer.tpl'}