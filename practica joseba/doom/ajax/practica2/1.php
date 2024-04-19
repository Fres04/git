<!DOCTYPE html>
 <html>
 <head>
 <title>numero aleatorio</title>
<meta charset = "UTF-8">
 <script>
 function loadDoc() {
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() { 
 if (this.readyState == 4 && this.status == 200) {
 document.getElementById("hora").innerHTML =
 "numero:" + this.response;
 }
 };
xhttp.open("GET", "hora_servidor.php", false);
 xhttp.send();
return false;
}

setInterval(loadDoc, 5000);
</script>
</head>
<body>
<h1>numero aleatorio</h1>
 <section id="hora"></section>
 </body>
 </html>