function validarEnvios(valor){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
    alert(`Pedido seleccionado: ${valor}`);
    }
    xhttp.open("GET", "envios_json.php", false);
    xhttp.send();
// return false;
};
function buscarProducto(valor){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        alert(`Producto a buscar: ${valor}`);
         }

        };
    xhttp.open("GET", "buscador_json.php", false);
    xhttp.send();
return false;
};
