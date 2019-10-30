{include file="header.tpl"}
{include file="navlogout.tpl"}
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
                  {if $id_usuario eq "1"}
                  <th>Borrar</th>
                  <th>Editar</th>
                  {/if}   
                </tr>
              </thead>
              <tbody>
                {foreach from=$peliculascongenero item=pelicula}
                <tr>
                  <td>{$pelicula["titulo"]}</td>
                  <td>{$pelicula["sinopsis"]}</td>
                  <td>{$pelicula["genero"]}</td> 
                  {if $id_usuario eq "1"}
                    <td><button><a href = "borrar/{$pelicula["id_pelicula"]}">Borrar</a></button></td>
                    <td><button><a href = "editar/{$pelicula["id_pelicula"]}">Editar</a></button></td>
                    <td><input type="text" name="tituloe" placeholder="Editar titulo"></td>
                  {/if}
                </tr>
                {/foreach}
              </tbody>
            </table>
          </div>
        </div>
      {if $id_usuario eq "1"}
        <div class="col-md-12">
          <div class="completar">
            <form action="insertar" method="post">
              <input type="text" name="titulo" placeholder="titulo">
              <input type="text" name="sinopsis" placeholder="sinopsis">
              <select name="id_generoFK">
                <option value="0">Terror</option>
                <option value="1">Acción</option>
                <option value="2">Ciencia Ficción</option>
                <option value="3">Comedia</option>
              <input type="submit" class="btn btn-success" value="Insertar">
            </form>
          </div>
        </div>
      {/if}
    </div>
{include file="footer.tpl"}