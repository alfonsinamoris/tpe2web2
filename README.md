# tpe2web2
<h1>ENDPOINTS</h1>
<h2>GET ALL</h2>
<p> URL:http://localhost/web2/tpe2/api/property  <strong>method:GET</strong> </p>
<h2>GET BY ID</h2>
<p> URL:http://localhost/web2/tpe2/api/property:ID <strong>method: GET</strong></p>
<h2>DELETE BY ID</h2>
<p> URL:http://localhost/web2/tpe2/api/property:ID <strong>method: DELETE</strong></p>
<h2>POST</h2>
<p> URL:http://localhost/web2/tpe2/api/property <strong>method:POST</strong> body:{
        "direccion": "pinto 444",
        "tipo": "2",
        "habitaciones": "3",
        "precio": "20000",
        "alquiler_venta": "alquier"
    } </p>
<h2>EDIT BY ID</h2>
<p> URL:http://localhost/web2/tpe2/api/property:ID <strong>method:PUT</strong> body:   {
        "direccion": "pinto 444",
        "tipo": "2",
        "habitaciones": "3",
        "precio": "20000",
        "alquiler_venta": "alquier"
    }</p>
<h2>ORDER BY COLUMN ASC OR DESC</h2>
<p> URL:http://localhost/web2/tpe2/api/property?sortby=columna&order=ASC/DESC <strong>method:GET</strong></p>
<h2>FILTER BY CATEGORY</h2>
<p> URL:http://localhost/web2/tpe2/api/property?filterByType=id_tipo  <strong>method:GET</strong></p>
  

