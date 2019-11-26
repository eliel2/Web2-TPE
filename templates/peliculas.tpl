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
              {if $admin eq "1"}
              <th>Borrar</th>
              <th>Editar</th>
              {/if}   
            </tr>
          </thead>
          <tbody>
            {foreach from=$peliculascongenero item=pelicula}
            <tr>
              <td><a href = "pelicula/{$pelicula["id_pelicula"]}">{$pelicula["titulo"]}</td>
              <td>{$pelicula["sinopsis"]}</td>
              <td>{$pelicula["genero"]}</td>
              {if isset ($pelicula["id_imagen"]) && ($pelicula["id_imagen"] eq $pelicula["id_pelicula"])}
                <td><img src="{$pelicula["imagen"]}"width="100" height="100"/></td>
              {else}
                <td><img src="img/image-not-found.png"width="100" height="100"/></td>
              {/if}
              {if $admin eq "1"}
                <td><button class="btn btn-danger"><a href = "borrar/{$pelicula["id_pelicula"]}">Borrar</a></button></td>
                <td><button class="btn btn-warning"><a href = "editar/{$pelicula["id_pelicula"]}">Editar</a></button></td>
              {/if}
            </tr>
            {/foreach}
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-3">
      <div class="container-c" style="width:90%;">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="https://www.bases123.com.ar/posters/9140_poster2.jpg" alt="Los Angeles" style="width:100%;">
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <img src="https://www.bases123.com.ar/posters/9381_poster2.jpg" alt="Chicago" style="width:100%;">
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <img src="https://www.bases123.com.ar/posters/9340_poster2.jpg" alt="New York" style="width:100%;">
              <div class="carousel-caption">
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  {if $admin eq "1"}
    <div class="col-md-12">
      <div class="completar">
        <form action="insertar" method="post">
          <input type="text" name="titulo" placeholder="Titulo">
          <input type="text" name="sinopsis" placeholder="Sinopsis">
          <select name="id_generoFK">
            {foreach from=$generos item=genero}
              <option value={$genero->id_genero}>{$genero->genero}</option>
            {/foreach}
          </select>
          <input type="submit" class="btn btn-success" value="Insertar">
        </form>
      </div>
    </div>
    <form action="InsertarImg" method="POST" enctype="multipart/form-data">
      <input type="file" name="input_name" id="imageToUpload">
      <select name="id_peliculasfk">
      {foreach from=$peliculascongenero item=pelicula}
        <option value={$pelicula["id_pelicula"]}>{$pelicula["titulo"]}</option>
      {/foreach}     
      </select>
      <input type="submit" class="btn btn-success" value="Insertar">
    </form>
  {/if}
</div>    
{include file="footer.tpl"}