// Obtener todos los enlaces de la página
let enlaces = document.getElementsByTagName("a");
console.log("Número de enlaces de la página: " + enlaces.length);

// Obtener la dirección a la que enlaza el penúltimo enlace
if (enlaces.length >= 2) {
  let penultimoEnlace = enlaces[enlaces.length - 2];
  console.log("Dirección a la que enlaza el penúltimo enlace: " + penultimoEnlace.href);
}

// Contar el número de enlaces que enlazan a http://prueba
let enlacesAHttpPrueba = document.querySelectorAll('a[href="http://prueba"]');
console.log("Número de enlaces que enlazan a http://prueba: " + enlacesAHttpPrueba.length);

// Obtener el tercer párrafo
let tercerParrafo = document.getElementsByTagName("p")[2];
if (tercerParrafo) {
  let enlacesEnTercerParrafo = tercerParrafo.getElementsByTagName("a").length;
  console.log("Número de enlaces del tercer párrafo: " + enlacesEnTercerParrafo);
}
