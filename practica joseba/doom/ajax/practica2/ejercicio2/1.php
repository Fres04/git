<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  onsubmit="event.preventDefault();return suma()">
Introduce numero1: <input type="number" id="num1">
Introduce numero2: <input type="number"id="num2">
<input type="submit">
</form>
<div id="resultado"></div> 
<script>
function suma(){
    let num1=document.getElementById('num1').value;
 let num2=document.getElementById('num2').value;
    var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() { 
 if (this.readyState == 4 && this.status == 200) {
 document.getElementById("resultado").innerHTML=this.response;
 }
 };

xhttp.open("GET", `hora_servidor.php?num1=${num1}&num2=${num2}`, false);
 xhttp.send();
return false;

}
   

   
   </script>

</body>
</html>