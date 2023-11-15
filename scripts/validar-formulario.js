document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario_contacto").addEventListener('submit',validacionformulario);
});


var msjerror = document.getElementById("msjerror");

// Función para validar los campos de entrada del formulario
function validacionformulario(evento) {
    evento.preventDefault();  // Para evitar ejecutar el formulario de manera predeterminada

    // Comprueba si el campo nombre es válido (no está vacío)
    var nombre = document.getElementById("txtnombres").value;

    if(nombre==null || nombre.length==0) {
        msjerror.innerHTML="El nombre no debe estar vacío";
        return false;
    }

    var regExpSoloLetras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/g;
    if(regExpSoloLetras.test(nombre)==false) {
        msjerror.innerHTML="El nombre sólo debe contener letras y espacios";
        return false;
    }

   // Comprueba si el campo apellidos es válido (no está vacío)
   var apellidos = document.getElementById("txtapellidos").value;

   if(apellidos==null || apellidos.length==0) {
       msjerror.innerHTML="El apellido no debe estar vacío";
       return false;
   }

   var regExpSoloLetras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/g;
   if(regExpSoloLetras.test(apellidos)==false) {
       msjerror.innerHTML="El apellido sólo debe contener letras y espacios";
       return false;
   }

    // Comprueba si la dirección de correo tiene un formato válido
    var regExpCorreo = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    var correo = document.getElementById("txtcorreo").value;
    if(regExpCorreo.test(correo)==false) {
        msjerror.innerHTML="El correo electrónico ingresado no tiene un formato válido";
        return false;
    }

    // Comprueba si el dni contiene sólo números y maximo de 8 digitos
    var regExpSoloNumeros= /^[0-9]{8}$/;
    var dni = document.getElementById("txtdni").value;
    if(regExpSoloNumeros.test(dni)==false) {
        msjerror.innerHTML="El DNI debe contener sólo 8 digitos numericos";
        return false;
    }
    
    // Comprueba si el teléfono contiene sólo números
    var regExpSoloNumeros=/^[0-9]{9}$/;
    var telefono = document.getElementById("txtcelular").value;
    if(regExpSoloNumeros.test(telefono)==false) {
        msjerror.innerHTML="El teléfono debe contener sólo 9 digitos númericos";
        return false;
    }

    // Comprueba si ha seleccionado un elemento de la lista 
    var i = document.getElementById("lstcarrera").selectedIndex;
    if(i==null || i==0) {
        msjerror.innerHTML="Debe seleccionar el tipo de ayuda de la lista";
        return false;
    }

   

    // Si paso todas las fases de validación, entonces ejecutará el programa PHP
    this.submit();
}