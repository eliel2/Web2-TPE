{literal}
<section id="template-vue-comentarios">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Comentarios</h4>
                <button id="btn-refresh" type="button" class="btn btn-primary btn-sm">Refresh</button>
            </div>

            <ul v-for="comentario in comentarios">
                    {{ comentario.comentarios }} 
            </ul>

            <div class="card-footer text-muted">
                {{ subtitle }}
            </div>
        </div>

       
        
</section>
{/literal}
