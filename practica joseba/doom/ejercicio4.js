document.addEventListener("DOMContentLoaded", function(event) {
    // El código para añadir el nodo irá aquí
  });
  document.addEventListener("DOMContentLoaded", function(event) {
    // Crear un nuevo nodo tipo elemento
    let nuevoNodo = document.createElement("div");
    
    // Crear un nodo tipo texto
    let texto = document.createTextNode("Este es un nuevo nodo insertado después de cargar la página.");
    
    // Añadir el nodo tipo texto al nodo tipo elemento
    nuevoNodo.appendChild(texto);
    
    // Encontrar el nodo padre al que se va a añadir el nuevo nodo
    let nodoPadre = document.getElementById("nodoPadre");
    
    // Añadir el nuevo nodo al final del nodo padre
    nodoPadre.appendChild(nuevoNodo);
  });
    