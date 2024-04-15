
let raizDelNodo = document.body;
function mostrarTiposDeNodo(node) {
  alert(node.nodeName);
  for (var i = 0; i < node.childNodes.length; i++) {
    mostrarTiposDeNodo(node.childNodes[i]);
  }
}
mostrarTiposDeNodo(raizDelNodo);
