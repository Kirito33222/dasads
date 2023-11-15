document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario_tramite").addEventListener('submit',validacionformulario);
});


var msjerror = document.getElementById("msjerror");

// Función para validar los campos de entrada del formulario
function validacionformulario(evento) {
    evento.preventDefault();  // Para evitar ejecutar el formulario de manera predeterminada

    // Comprueba si el dni contiene sólo números y maximo de 8 digitos
    var regExpSoloNumeros= /^[0-9]{8}$/;
    var dni = document.getElementById("txtdni").value;
    if(regExpSoloNumeros.test(dni)==false) {
        msjerror.innerHTML="El DNI debe contener sólo 8 digitos numericos";
        return false;
    }
    

    // Si paso todas las fases de validación, entonces ejecutará el programa PHP
    this.submit();
}