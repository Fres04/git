let nombre= document.getElementById ('nombreCompleto');
nombre.addEventListener('blur',function(){
    let validacionNom = nombre.value.split(" ");
    if (validacionNom.length <2 ){
       // formulario.reset();
       alert ("Por favor, ingrese su Nombre correctamente");
       edad.focus();    
    }
});
let edad = document.getElementById('edad');
edad.addEventListener('blur',function(){
let validacionEdad = parseInt(edad.value,10);
if(validacionEdad <10 || validacionEdad >100){
alert("Edad invalida");
passwd.focus();
}
});
//Validar que la contraseña y la confirmación de contraseña sean iguales
let passwd = document.getElementById('passw').value; 
let confPasswd = document.getElementById('confirmar-passw')  

confPasswd.addEventListener('keyup', function() {
  if (passwd != confPasswd.value) {
    confPasswd.setCustomValidity('Las Contraseñas no coinciden');
  } else confPasswd.setCustomValidity('');
});

//validar correo  electronico
let email =document.getElementById('email');

let regex = /\S+@\S+\.\S+/;

email.addEventListener('blur',function () {
let valorEmail= document.getElementById('email').value;

    if (!valorEmail.checkValidity()) {
    email.style.border='3px solid red';
    email.nextElementSibling.innerHTML="Correo Electronico Incorrecto";
  }else{
    email.style.border='3px solid green';
    email.nextElementSibling.innerHTML=" ";
  }
});
 