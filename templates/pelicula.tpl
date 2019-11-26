{include file="header.tpl"}
{if $admin eq 1 || $admin eq 0}
  {include file="navlogout.tpl"}
{else}
  {include file="navlogin.tpl"}
{/if}

<div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="tabla" style="margin: 0 auto;">
            <table>
          <thead>
            <tr>
              <th>Pelicula</th>
              <th>Sinopsis</th>
              <th>Genero</th>
              <th>Imagen</th>
              {if $admin && $admin eq "1"}
              <th>Borrar</th>
              <th>Editar</th>
              {/if}   
            </tr>
          </thead>
          <tbody>
            {foreach from=$pelicula item=peli}
            <tr>
              <td>{$peli["titulo"]}</td>
              <td>{$peli["sinopsis"]}</td>
              <td>{$peli["genero"]}</td>
              {if isset($peli["id_imagen"]) && $peli["id_imagen"] eq $peli["id_pelicula"]}
                <td><img src="{$peli["imagen"]}"width="100" height="100"/></td>
              {else}
                <td><img src="img/image-not-found.png"width="100" height="100"/></td>
              {/if}
              {if $admin && $admin eq "1"}
                <td><button class="btn btn-danger"><a href = "borrar/{$peli["id_pelicula"]}">Borrar</a></button></td>
                <td><button class="btn btn-warning"><a href = "editar/{$peli["id_pelicula"]}">Editar</a></button></td>
              {/if}
            </tr>
            {/foreach}
          </tbody>
        </table>
          </div>
        </div>
    </div>
    {include file="vue/comentarios.tpl"}

            <form id="FormComentarios" action="insertar" method="post">
               <textarea class="form-control" name="comentario" id="Comentarios" rows="3"></textarea>
                <input type="number" name="puntaje"  max="10">
                <input type="submit" value="Insertar">
            </form>

<script src="js/peliculas.js"></script>
</div>          
{include file="footer.tpl"}