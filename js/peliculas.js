"use strict"

    let app = new Vue({
        el: "#template-vue-comentarios",
        data: {
            subtitle: "Comentando",
            comentarios: [],
            auth: true
        }
    });
    
    function GetComentarios() {
        let id_pelicula = document.getElementById("pelid").value;

        fetch("api/comentarios/" + id_pelicula)
        .then(response => response.json())
        .then(comentarios => {
            app.comentarios = comentarios,
            console.log(comentarios)
        })
        .catch(error => console.log(error));
    }
    async function AddComentarios(e) {
        e.preventDefault();
        let data = {
            comentario: document.querySelector("textarea[name=comentario]").value,
            puntaje: document.querySelector("input[name=puntaje]").value,
            id_peliculafk: document.getElementById("pelid").value
            
        }

        let id_peliculafk = document.getElementById("pelid").value;
    
        let response = await fetch("api/comentarios/" + id_peliculafk, {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json",
            },
            "body": JSON.stringify(data)
        });
        if (!response.ok)
            console.log("Error de conexion");

        }
        GetComentarios();

        function DeleteComentarios(id){ 
            fetch("api/comentarios"+ id, {
                method: 'DELETE',
            })
            .then(response => response.GetComentarios())
            .catch(error => console.log(error));
    }
GetComentarios();
document.querySelector("#FormComentarios").addEventListener('submit', AddComentarios);