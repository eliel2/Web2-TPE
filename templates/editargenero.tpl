{include file="header.tpl"}
{include file="navlogout.tpl"}
                {if $admin eq "1"}

                    <form action="editarG" method="post">
                  <input type="text" name="genero" value="{$genero->genero}"></td>
                  <input type="hidden" name="id_genero" value="{$genero->id_genero}">
                    <input type="submit" class="btn btn-success" value="Editar">
                    </form>
                {/if}
{include file="footer.tpl"}