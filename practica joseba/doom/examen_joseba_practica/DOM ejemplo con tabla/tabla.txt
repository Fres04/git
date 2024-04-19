// Solo se ejecutará el codigo js si el DOM esta cargado.
document.addEventListener('DOMContentLoaded', () => {
    let btnAdd = document.getElementById('btnAdd');
    let btnMove = document.getElementById('btnMove');
    let btnSwap = document.getElementById('btnSwap');
    let aDelete = document.getElementById('aDelete');
    let aColorPar = document.getElementById('aColorPar');
    
    //Seleccionamos el cuerpo de la tabla
    let cuerpoTabla = document.getElementById('cuerpoTabla');

    // Función para añadir una fila al principio de la Tabla
    btnAdd.addEventListener('click', () => {
        // Contamos cuantas filas tiene la tabla
        let numFilas = cuerpoTabla.getElementsByTagName('tr').length;
        // Creamos una nueva fila
        let nuevaFila = document.createElement('tr'); 
        nuevaFila.setAttribute("id", `fila-${numFilas + 1}`)
        // Creamos tres celdas para la fila
        for (let i = 0; i < 3; i++) { 
            let celda = document.createElement('td');
            // Ajustamos el contenido.
            //   textContent => Ignora las etiquetas CSS y recoge solo el texto contenido en el nodo
            //   innerHTML => Devuelve el contenido interno del nodo,respetando las etiquetas html.
            celda.textContent = `Fila ${numFilas+1}, Columna ${i + 1}`;
            // Añade cada celda a la fila
            nuevaFila.appendChild(celda); 
        }
        // console.log(nuevaFila);
        cuerpoTabla.insertBefore(nuevaFila, cuerpoTabla.firstChild); // Inserta la fila al principio de la Tabla
    });

    // Función para mover el nodos de la primera fila al final de la tabla
    btnMove.addEventListener('click', () => {
        // Comprobamos que tenemos varias filas
        if (cuerpoTabla.rows.length > 1) {
            // Seleecionamos la primera fila
            let primeraFila = cuerpoTabla.firstChild;
            // Eliminamos la primera fila
            cuerpoTabla.removeChild(primeraFila); 
            // Añadimos la fila removida al final de la Tabla
            cuerpoTabla.appendChild(primeraFila); 
        }
    });

    // Función para intercambiar los nodos
    // OJO - Muy complicada técnicamente
    function swapTr(){
        // Comprobamos que tenemos varias filas
        if (cuerpoTabla.rows.length > 1) {
            // Seleccionamos la primera y la última fila como elementos
            // los elementos son un típo particular de nodo, que garantizar que tomamos la referencia al nodo correcto
            // https://www.iteramos.com/pregunta/39326/diferencia-entre-objeto-nodo-y-objeto-elemento
            let primeraFila = cuerpoTabla.firstElementChild;
            let ultimaFila = cuerpoTabla.lastElementChild;
    
            // // Clonamos las filas para mantener una copia al reemplazarlas
            let clonPrimera = primeraFila.cloneNode(true);
            let clonUltima = ultimaFila.cloneNode(true);
    
            // Reemplazamos la primera fila por la última
            cuerpoTabla.replaceChild(clonUltima, primeraFila);
            // Reemplazamos la última fila por la primera
            cuerpoTabla.replaceChild(clonPrimera, ultimaFila);
        /*
            - Intercambiar los nodos con replaceChild, hace que alteremos la estrucutra del DOM.
            - Los nodos seleccionados inicialmente guardar referencias a la estructura original.
            - Al manipular el dom, pierden su referencia inicial, ya que le dom cambia.
            con lo que no podemos moverlos correctamente, por tanto, el siguiente código es erróneo.
        */
        /*
            let primeraFila = cuerpoTabla.firstChild;
            let ultimaFila = cuerpoTabla.lastChild;
    
            // Reemplazamos la primera fila por la última
            cuerpoTabla.replaceChild(primeraFila, cuerpoTabla.lastChild);
            // Reemplazamos la última fila por la primera
            cuerpoTabla.replaceChild(ultimaFila, cuerpoTabla.firstChild);
        */
        }
    }

    // Evento asociado al botón que ejecuta la función anterior.
    btnSwap.addEventListener('click', swapTr);

    // Evento asociado al enlace de eliminar filas. Deshabilitamos el comportamiento habitual del enlace.
    aDelete.addEventListener('click', (event) => {
        event.preventDefault();
        // Elimino la primera fila
        cuerpoTabla.removeChild(cuerpoTabla.lastChild); 
    });

    /* ¿Por qué sabe JavaScript que ese es el evento que tiene que utilizar?
    - Por la gestión automática de eventos.
    - JavaScript y el navegador gestionan la creación y el envío de objetos de eventos 
    como parte de cómo funcionan los eventos en el DOM.
    - Cuando establecemos un manejador de eventos, el navegador se encarga de invocar ese manejador
    cada vez que ocurre el evento, proporcionando automáticamente el objeto de evento relevante.
    - Las funciones definidas en addEventListener pueden acceder a este evento, el cual nombraremos como deseemos: e, ev, evn, event, evento, ...
    */
   
   // Evento asociado enlace de cambiar color de las filas pares.
   aColorPar.addEventListener('click',(e)=>{
       e.preventDefault();
       // Seleccionamos todas las filas
       let filas = document.querySelectorAll('tr');
       // Recorremos cada una de las filas
       for (let i = 0; i<filas.length; i++){
        //Busco el número de fila
           const numeroFila = parseInt(filas[i].id.replace('fila-',''));
           // Cambio el color de la fila si su número es par.
           if (numeroFila % 2 === 0){
               filas[i].style.backgroundColor = '#666666';
            }
        }
    });
});
    