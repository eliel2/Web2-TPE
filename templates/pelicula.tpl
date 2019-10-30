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
                        <th>Borrar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>                    
                        <td>{$pelicula->titulo}</td>
                        <td>{$pelicula->sinopsis}</td>
                        <td><input type="text" name="tituloe" placeholder="Editar titulo"></td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>          
{include file="footer.tpl"}