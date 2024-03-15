<?php
if (!isset($_COOKIE['visitas'])){
    setcookie('visor','1',time()+3600*24); 
}
else{
$visitas = (int) $_COOKIE['visitas'];
$visitas++;
if($visitas===3){
    setcookie('visor','1',time()-3600*24); //Duracion
    unset ($_COOKIE['visitas']);
    echo "cookie destruida";
}else{
    setcookie('visor',$visitas,time()+3600*24); //Duracion
    echo "Bienvenido por $visitas vez";
}
}