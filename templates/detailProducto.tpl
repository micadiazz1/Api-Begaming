{include file='templates/header.tpl'}
    
    <h1> {$producto->nombre_categoria} </h1>
    
    <ul>
        <li> nombre: {$producto->nombre} </li>
        <li> Descripcion: {$producto->descripcion} </li>
        <li> Precio: {$producto->precio}</li>
         
    </ul> 

    <a href="productos">Volver atras</a>

{include file='templates/footer.tpl'}