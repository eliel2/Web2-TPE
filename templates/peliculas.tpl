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
                  <th>Valor</th>
                  <th>Al carro</th>   
                </tr>
              </thead>
              <tbody>
              {foreach from=$lista_peliculas item=pelicula}
                <tr>
                  <td>{$pelicula->titulo}</td>
                  <td>{$pelicula->sinopsis}</td>
                  <td>{$pelicula->valor}</td> 
                  <td><input type="submit" class="btn btn-success" value="comprar"></td>     
                  <td><button><a href = "borrar/{$pelicula->id_pelicula}">Borrar</a></button></td>
                </tr>
              </tbody>
              {/foreach}
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
                  <h3>Los Angeles</h3>
                  <p>LA is always so much fun!</p>
                </div>
              </div>
              <div class="item">
                <img src="https://www.bases123.com.ar/posters/9381_poster2.jpg" alt="Chicago" style="width:100%;">
                <div class="carousel-caption">
                  <h3>Chicago</h3>
                  <p>Thank you, Chicago!</p>
                </div>
              </div>
              <div class="item">
                <img src="https://www.bases123.com.ar/posters/9340_poster2.jpg" alt="New York" style="width:100%;">
                <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
                </div>
              </div> 
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a>
          </div>
        </div>
      </div>
      {if $id_usuario eq "0"}
      <div class="col-md-12">
        <div class="completar">
          <form action="insertar" method="post">
            <input type="text" name="titulo" placeholder="titulo">
            <input type="text" name="sinopsis" placeholder="sinopsis">
            <input type="text" name="genero" placeholder="genero">
            <input type="number" name="valor" placeholder="valor">
            <input type="submit" class="btn btn-success" value="Insertar">
          </form>
        </div>
      </div>
      {/if}
    </div>
{include file="footer.tpl"}