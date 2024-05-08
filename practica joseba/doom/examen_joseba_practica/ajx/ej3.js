document.addEventListener("DOMContentLoaded", function() {
  let recursoInput = document.getElementById("recurso");
  let enviarBtn = document.getElementById("enviar");
  let contenidoDelArchivo = document.getElementById("contenidos");
  let estadosDiv = document.getElementById("estados");
  let cabecerasDiv = document.getElementById("cabeceras");
  let codigoDiv = document.getElementById("codigo");
  let horaActual = performance.now();
  recursoInput.value = window.location.href;

  enviarBtn.addEventListener("click", function() {
    let xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
      contenidoDelArchivo.textContent = xhttp.responseText;
      codigoDiv.textContent = "Código de estado: " + xhttp.status + " " + xhttp.statusText;
      let headers = xhttp.getAllResponseHeaders();
      cabecerasDiv.textContent = headers;
    };
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState === 4) {
        let horaFinal = performance.now();
        let tiempoEnMilisegundos = horaFinal - horaActual;
        estadosDiv.textContent = "UNSENT " + tiempoEnMilisegundos.toFixed(2) + " ms";
        horaActual = performance.now();
      }
    };
    xhttp.open("GET", recursoInput.value, false);
    xhttp.send();
  });
});
