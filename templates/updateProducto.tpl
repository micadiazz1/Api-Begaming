{include file='templates/header.tpl'}
    
    
    <form action="confirmacionUpdateProducto/{$producto->id_producto}" method="post" enctype="multipart/form-data">
            <label >Nombre:</label>
            <input type="text" name="nombre" id="nombre"  placeholder="Nombre"  value="{$producto->nombre}" >
            <label >Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion"  placeholder="Descripcion" value="{$producto->descripcion}">
            <label >precio:</label>
            <input type="number" name="precio" id="precio"  placeholder="Precio" value="{$producto->precio}">
            <select type="text" name="id_categoria" id="id_categoria">
                <option value="{$producto->id_categoria_fk}"> {$producto->nombre_categoria}</option>
                
                {foreach from=$categorias item=$categoria}
                    
                    {if  $producto->nombre_categoria != $categoria ->nombre_categoria }
                          <option value={$categoria->id_categoria}>{$categoria->nombre_categoria} </option>  
                    {/if}
                            
                
                {/foreach}
                
            </select>
            
            <input type="file" name="imagen" id="imageToUpload">
            
            <input type="submit" value="modificar">
            
    </form>
    <a href="admin">Volver atras</a>

{include file='templates/footer.tpl'}