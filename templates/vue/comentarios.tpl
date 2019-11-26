{literal}
<section id="template-vue-comentarios">

    <h3> {{ subtitle }} </h3>

    <ul>
       <li v-for="comentario in comentarios">

                 <span > {{ comentario.comentario }} - {{comentario.puntaje}} </span> 

           <span>
               <button v-on:click="deleteComentario(comentario.IdComentario)" class="btn">borrar</button>
          </span>
       </li> 
    </ul>

</section>
{/literal}
