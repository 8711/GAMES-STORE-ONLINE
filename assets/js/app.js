var usuario = document.getElementById('usuario');
var password = document.getElementById('password');
var error = document.getElementById('error');
error.style.color = 'red';

function enviarFormulario(){
    console.log('Enviando formulario...');

    var mensajesError = [];

    if(usuario.value === null || usuario.value === ''){
        mensajesError.push('Complete este campo');
    }

    if(password.value === null || password.value === ''){
        mensajesError.push('Complete este campo');
    }

   error.innerHTML =  mensajesError.join(', ');


    return false;
}