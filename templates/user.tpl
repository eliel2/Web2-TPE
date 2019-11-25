{include file="header.tpl"}
{include file="navlogin.tpl"}
        <form action="iniciarSesion" method="post">
            <input type="text" name="user" placeholder="Usuario">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" value="Login">
            <button><a href = "registro">Registrarse</a></button>
        </form>
        <button><a href = "olvidosucontrasena">Olvidaste tu contraseña?</a></button>

{include file="footer.tpl"}