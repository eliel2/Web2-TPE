"use strict";
    function funcionAlerta(mensaje){
        alert(mensaje);
    }
    let btnenvio = document.getElementById("enviar");
    let btncambio = document.getElementById ("cambio");
    let cambio = "Cambio con exito la contraseña";
    let envio = "Se envio al correo un mail para recuperar contrasena";
    btncambio.addEventListener ("click", funcionAlerta(cambio));
    btnenvio.addEventListener ("click", funcionAlerta(envio));