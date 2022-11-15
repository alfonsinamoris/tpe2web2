# tpe2web2
<h1>ENDPOINTS</h1>
<p> URL:web2/tpe2/api/property method:GET, trae todo de la base de datos </p>
<p> URL:web2/tpe2/api/property:ID method: GET, trae por id </p>
<p> URL:web2/tpe2/api/property:ID method: DELETE, borra por id </p>
<p> URL:web2/tpe2/api/property method:POST ,body:{
        "direccion": "pinto 444",
        "tipo": "2",
        "habitaciones": "3",
        "precio": "20000",
        "alquiler_venta": "alquier"
    } agrega un fila a la base de datos </p>
<p> URL:web2/tpe2/api/property:ID method:PUT ,body:   {
        "direccion": "pinto 444",
        "tipo": "2",
        "habitaciones": "3",
        "precio": "20000",
        "alquiler_venta": "alquier"
    } edita un elemento por su id </p>
<p> URL:web2/tpe2/api/property?sortby=columna&order=ASC/DESC method:GET, ordena el campo elegido de manera ascendente o descendente </p>
<p> URL:web2/tpe2/api/property?filterByType=id_tipo  method:GET, filtra por numero de categoria </p>
  

