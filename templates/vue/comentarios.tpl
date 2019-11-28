{literal}
<section id="template-vue-comentarios">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Comentarios</h4>
                
            </div>

            <ul v-for="comentario in comentarios">
                <span> {{ comentario.comentarios }}</span> ....puntaje: <span> {{ comentario.puntaje }}</span>
                <span >
                    <button v-on:click="DeleteComentarios(comentario.id_comentarios)" class="btn">borrar</button>
                </span>
            </ul>

            <div class="card-footer text-muted">
                {{ subtitle }}
            </div>
        </div>

       
        
</section>
{/literal}
