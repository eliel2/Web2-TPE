{include file="header.tpl"}
{include file="navlogin.tpl"}

    <form action="olvidecontrasena" method="post">
            <input type="text" name="usuarior" placeholder="Nombre de usuario">
            <input type="text" name="emailr" placeholder="Email">
            <input type="submit" class="btn btn-success" id="enviar" value="Enviar email de recupero">
    </form>

{include file="footer.tpl"}