"use strict"

    let app = new Vue({
        el: "#template-vue-comentarios",
        data: {
            subtitle: "Comentando",
            comentarios: [],
            auth: true
        }
    });
    
    function GetComentario() {
        let id_pelicula = document.getElementById("pelid").value;
        console.log(id_pelicula);
        fetch("api/comentarios/" + id_pelicula)
        .then(response => response.json())
        .then(comentarios => {
            app.comentarios = comentarios,
            console.log(comentarios)
        })
        .catch(error => console.log(error));
    }
GetComentario();