<script type="text/javascript">
var xhttp = new XMLHttpRequest();
xhttp.open("GET", " hora_servidor.php ", false);
xhttp.send();
if (xhttp.status == 200) {
alert("OK");
} if(xhttp.status == 404) {
alert("Error no se encuentra");
}
else{
    alert ("Error al conectar: "+xhttp.status);
}
 alert(xhttp.response);
</script>