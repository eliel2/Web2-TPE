{include file="header.tpl"}
{include file="navlogout.tpl"}
                {if $id_usuario eq "1"}

                    <form action="editar" method="post">
                  <input type="text" name="tituloe" value="{$pelicula->titulo}"></td>
                  <input type="text" name="sinopsise" value="{$pelicula->sinopsis}">
                  <input type="hidden" name="id_pelicula" value="{$pelicula->id_pelicula}">
                  <select name="id_generoFKe">
                    {foreach from=$generos item=genero}
                        <option value={$genero->id_genero}>{$genero->genero}</option>
                    {/foreach}
                    </select></td>
                    <input type="submit" class="btn btn-success" value="Editar">
                    </form>
                {/if}
{include file="footer.tpl"}