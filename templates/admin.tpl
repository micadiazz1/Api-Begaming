{include file='templates/header.tpl'}

    
   
    
    <h2>Lista de productos:</h2>

    <div>
        <table class="table">
  <thead>
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">categoria</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        {foreach from=$productos item=$producto}
        <tr>
            <td >{$producto->nombre}</td>
            <td>{$producto->descripcion}</td>
            <td> {$producto->precio}</td>
            <td>{$producto->nombre_categoria}</td>
            
            {if isset($producto->imagen)}
                <td><img class="imgAdmin" src="{$producto->imagen}"/></td>
            {/if} 
            <td> <a href="deleteProducto/{$producto->id_producto}" class="btn btn-outline-danger">borrar</a></td>
            <td> <a href="formEditarProducto/{$producto->id_producto}" class="btn btn-outline-primary" >modificar</a> </td>

        </tr>
        {/foreach}
        <tr>
    </tbody> 
</table>
    </div>

    <p>Agregue un nuevo producto:</p>

    <form action="createProducto" method="post" enctype="multipart/form-data">
            <input type="text" name="nombre" id="nombre"  placeholder="Nombre" >
            <input type="text" name="descripcion" id="descripcion"  placeholder="Descripcion">
            <input type="number" name="precio" id="precio"  placeholder="Precio">
            <select type=text name="id_categoria" id="id_categoria">
                {foreach from=$categorias item=$categoria}
                    <option value={$categoria->id_categoria}>{$categoria->nombre_categoria} </option>         
                {/foreach}
            </select>
            <input type="file" name="imagen" id="imageToUpload">
            <input type="submit" value="Guardar">
            
    </form>

    <h3>Lista de categorias:</h3>
    <div class="lista-categoria">
        <ul>
            {foreach from=$categorias item=$categoria}
                <li> {$categoria->nombre_categoria}  <a href="deleteCategoria/{$categoria->id_categoria}">borrar</a> - <a href="formEditarCategoria/{$categoria->id_categoria}">modificar</a></li>         
            {/foreach}
        </ul>
    </div>

    <p>Agregue una nueva categoria:</p>

    <form action="createCategoria" method="post">
            <input type="text" name="nombre_categoria" id="nombre_categoria"  placeholder="nombre">
            <input type="submit" value="Guardar">       
    </form>

    <br>
    
    <a href="home/">Volver al home</a>


{include file='templates/footer.tpl'}
