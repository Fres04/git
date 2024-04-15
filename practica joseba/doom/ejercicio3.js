// Crear nodo tipo elemento
let nuevoElemento = document.createElement("p");

// Crear nodo tipo texto
let texto = document.createTextNode("Este es un nuevo nodo de texto.");

// Añadir al tipo elemento el nodo tipo texto
nuevoElemento.appendChild(texto);

// Agregar el nuevo elemento al documento
document.body.appendChild(nuevoElemento);
// Buscar el nodo a eliminar
let nodoAEliminar = document.getElementById("nodoAEliminar");

// Eliminar a través de la referencia del padre
nodoAEliminar.parentNode.removeChild(nodoAEliminar);
