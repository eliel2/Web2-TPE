{include file="header.tpl"}
{include file="navlogout.tpl"}
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="tabla" style="margin: 0 auto;">
        <table>
          <thead>
            <tr>                  
              <th>Generos</th>            
              {if $admin eq "1"}
                <th>Borrar</th>
                <th>Editar</th>
              {/if} 
            </tr>
          </thead>
          <tbody>
            {foreach from=$generos item=genero}
              <tr>                    
                <td>{$genero->genero}</td>
                {if $admin eq "1"}
                  <td><button class="btn btn-danger"><a href = "borrarG/{$genero->id_genero}">Borrar</a></button></td>
                  <td><button class="btn btn-warning"><a href = "editarG/{$genero->id_genero}">Editar</a></button></td>
                {/if}
              </tr>
            {/foreach}
          </tbody>
        </table>
      </div>    
    </div>
  </div>
</div>  
{if $admin eq "1"}
  <div class="col-md-12">
    <div class="completar">
      <form action="insertarG" method="post">
        <input type="text" name="genero" placeholder="genero">
        <input type="submit" class="btn btn-success" value="Insertar">
      </form>  
    </div>
  </div>
{/if}      
{include file="footer.tpl"}