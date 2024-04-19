<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>
    <div id="tablaProductos"></div>
    <a href="#" onclick="location.reload();">Recargar la página</a>

    <script>
        function crearTabla(datos) {
            let tabla = document.createElement('table');
            let encabezado = tabla.createTHead();
            let filaEncabezado = encabezado.insertRow();
            let titulos = ['Código de Producto', 'Nombre', 'Descripción', 'Peso', 'Stock', 'Código de Categoría'];
            titulos.forEach(titulo => {
                let th = document.createElement('th');
                th.appendChild(document.createTextNode(titulo));
                filaEncabezado.appendChild(th);
            });
            let cuerpoTabla = tabla.createTBody();
            datos.forEach(producto => {
                let fila = cuerpoTabla.insertRow();
                Object.values(producto).forEach(valor => {
                    let celda = fila.insertCell();
                    celda.appendChild(document.createTextNode(valor));
                });
            });
            return tabla;
        }

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let data = JSON.parse(this.responseText);
                let tablaProductos = document.getElementById('tablaProductos');
                tablaProductos.appendChild(crearTabla(data));
            } else if (this.readyState === 4) {
                console.error('Error al obtener los datos de los productos');
            }
        };
        xhttp.open("GET", "datos_categorias_json.php", true);
        xhttp.send();
    </script>
</body>
</html>

