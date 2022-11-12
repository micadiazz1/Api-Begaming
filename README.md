API REST para el recurso de productos

Una API REST sencilla para manejar un CRUD de hardware y resenias de la misma


Postman
Los endpoint de la API es: 
    
    GET http://localhost/Api-BeGaming/api/producto  Recibo de esta peticion todos los productos de mi base datos.

    GET http://localhost/Api-BeGaming/api/producto?limit=5&offset=0: De esta peticion se recibe todos los producto pero con una paginacion
        limit especifica cuandos productos queres que se muestren y el offset especifica el número de filas que se van a omitir antes de que se recupere alguna fila.

    GET http://localhost/Api-BeGaming/api/producto/:ID Recibo de esta peticion un solo producto de un id especifico.
    
    DELETE http://localhost/Api-BeGaming/api/producto/40  Esta peticion elimina un producto con un id especifico.
    
    POST http://localhost/Api-BeGaming/api/producto Con esta peticion atravez del body se podria agregar un producto, 
        solo si escribiste bien los campos de la tabla.

        ej: {
                "nombre": "intel",
                "descripcion": "Modelo 4500 Socket AM4 APU 3th Gen núcleos 6",
                "precio": 69990,
                "id_categoria_fk": 8
        }

    GET http://localhost/Api-BeGaming/api/producto/:ID/resenia?sort=calificacion&order=asc: Esta peticion me devuelve todas las resenias de un producto especificopero tengo que especificar con el sort que campo de mi tabla resenia quiero que se muestre de forma ascendente o descentende (esto se espefica con el order)

  