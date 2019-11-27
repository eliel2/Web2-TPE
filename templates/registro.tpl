{include file="header.tpl"}
{include file="navlogin.tpl"}
            <form action="registrar" method="post">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="text" name="email" placeholder="Mail">
            <select>
                <option>Lugar de nacimiento</option>
                <option>Nombre de la madre</option>
                <option>Nombre del padre</option>
                <option>Nombre de escuela primaria</option>
                <option>Nombre de primera mascota</option>
            </select>
            <input type="text" name="pregunta" placeholder="Respuesta secreta">
            <input type="password" name="contrasena" placeholder="Password">
            <input type="submit" value="Registrar">
        </form>
{include file="footer.tpl"}