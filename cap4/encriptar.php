<?php
/*** Función que recibe una clave a encriptar y un dígito   ***/
/*** devuelve la clave encriptada							***/ 
function encript_blowfish($clave, $digito = 7) {
	$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$salt = sprintf('$2a$%02d$', $digito);
	for($i = 0; $i < 22; $i++)
	{
		$salt .= $set_salt[mt_rand(0, 63)];
	}
	return crypt($clave, $salt);
}
/***    Función que recibe una clave encriptada y 			***/
/***    una clave sin encriptar.   							***/
/***    Devuelve true si la clave se corresponde con la 	***/
/***	clave encriptada y false en caso contrario			***/ 												
function correcto_blowfish($encr,$sin_encr){
	return crypt($sin_encr, $encr) == $encr;
}

?>