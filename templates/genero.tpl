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
                        <th>Genero</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>                    
                        <td>{$genero->genero}</td>
                                 
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>          
{include file="footer.tpl"}