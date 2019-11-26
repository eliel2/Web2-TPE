//document.addEventListener("DOMContentLoaded", function(){
    "use strict";

    let app = new Vue({
        el: "#template-vue-comentarios",
        data: {
            subtitle: "Comentando",
            comentarios: [], 
            auth: true
        }
    });
    
    function GetComentarios() {
        fetch("api/comentarios/" + id)
        .then(response => response.json())
        .then(comentarios => {
            app.comentarios = comentarios; 
        })
        .catch(error => console.log(error));
    }
    
    function AddComentarios(e) {
        e.preventDefault();
        
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
    
    