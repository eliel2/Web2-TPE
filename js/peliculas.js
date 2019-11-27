"use strict";


    let app = new Vue({
        el: "#template-vue-comentarios",
        data: {
            subtitle: "Comentando",
            loading: false,
            comentarios: [],
            auth: true
        }
    });
    
    function GetComentario() {
        app.loading = true;
        fetch("api/comentarios")
        .then(response => response.json())
        .then(comentarios => {
            app.loading = false,
            app.comentarios = comentarios;
        })
        .catch(error => console.log(error));
    }
    
        let data = {
            comentario: document.querySelector("textarea[name=comentario]").value,
            puntaje: document.querySelector("input[name=puntaje]").value,
            
        }
    
        fetch("api/comentarios", {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},       
            body: JSON.stringify(data) 
         })
         .then(response => {
             GetComentarios();
         })
         .catch(error => console.log(error));
    }
    async function DeleteComentarios(id){ 
        fetch("api/comentarios"+ id, {
            method: 'DELETE',
         })
         .then(response => {
             GetComentarios();
         })
         .catch(error => console.log(error));
    }
    GetComentarios();
    document.querySelector("#FormCometarios").addEventListener('submit', addComentarios);
    document.querySelector("#DeleteComentario").addEventListener('submit', DeleteComentarios);
    
    
