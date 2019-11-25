{include file="header.tpl"}
{include file="navlogin.tpl"}
    <form action="contrasenanueva" method="post">
                <input type="text" name="usuarion" value="{$usuario->usuario}"></td>
                <input type="text" name="emailn" value="{$usuario->email}">
                <input type="hidden" name="id_usuario" value="{$usuario->id_usuario}">
                <input type="password" name="nuevacontra" placeholder="Contrasena nueva">
                <input type="submit" class="btn btn-success" id="cambio" value="Cambiar">
    </form>

{include file="footer.tpl"}