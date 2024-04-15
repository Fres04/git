// Con la ruta completa
let nodoCompleto = document.querySelector("#miArbol #nodoPadre #nodoHijo");

// A partir de un nodo, al primer y al último hijo
let nodoPadre = document.getElementById("nodoPadre");
let primerHijo = nodoPadre.firstElementChild;
let ultimoHijo = nodoPadre.lastElementChild;

// Como un vector
let nodos = document.getElementsByTagName("div");
let primerNodo = nodos[0];

// A través del nombre de la etiqueta y accediendo a la posición del vector
let nodosDiv = document.getElementsByTagName("div");
let segundoDiv = nodosDiv[1];

// A través del nombre del elemento
let nodoPorNombre = document.getElementsByName("nombreDelNodo")[0];

// A través del id del elemento
let nodoPorId = document.getElementById("idDelNodo");
