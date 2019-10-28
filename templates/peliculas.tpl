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
                  <th>Al carro</th>
                  {if $id_usuario eq "1"}
                  <th>Borrar</th>
                  <th>Editar</th>
                  {/if}   
                </tr>
              </thead>
              <tbody>
                <tr>
              {foreach from=$peliculascongenero item=pelicula}
                  <td>{$pelicula["titulo"]}</td>
                  <td>{$pelicula["sinopsis"]}</td>
                  <td>{$pelicula["genero"]}</td> 
                  <td><input type="submit" class="btn btn-success" value="comprar"></td>
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
              <input type="text" name="id_generoFK" placeholder="genero">
              <input type="submit" class="btn btn-success" value="Insertar">
            </form>
          </div>
        </div>
      {/if}
    </div>
{include file="footer.tpl"}