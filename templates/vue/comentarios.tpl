{literal}
<section id="template-vue-comentarios">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Comentarios</h4>
                <button id="btn-refresh" type="button" class="btn btn-primary btn-sm">Refresh</button>
            </div>

            <ul v-if="!loading" class="list-group list-group-flush">
                Cargando comentarios...
            </ul>
            <ul>
                <a v-for="comentario in comentarios" v-bind:href="'comentarios/' + comentarios.id_comentarios" class="list-group-item list-group-item-action"> 
                    {{ comentario.comentarios }} 
                </a>
            </ul>

            <div class="card-footer text-muted">
                {{ subtitle }}
            </div>
        </div>

       
        
</section>
{/literal}
