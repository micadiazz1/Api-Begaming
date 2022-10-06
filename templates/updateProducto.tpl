{include file='templates/header.tpl'}
    
    
    <form action="confirmacionUpdateProducto/{$id}" method="post">
            <input type="text" name="nombre" id="nombre"  placeholder="Nombre"   >
            <input type="text" name="descripcion" id="descripcion"  placeholder="Descripcion" >
            <input type="number" name="precio" id="precio"  placeholder="Precio" >
            <select type="text" name="id_categoria" id="id_categoria">
                {foreach from=$categorias item=$categoria}
                    <option value={$categoria->id_categoria}>{$categoria->nombre_categoria} </option>         
                {/foreach}
            </select>
            <input type="submit" value="modificar">
            
    </form>
    <a href="admin">Volver atras</a>

{include file='templates/footer.tpl'}