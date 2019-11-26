<nav class="navbar navbar-inverse">
  <div class="navbar-header">
    <a class="navbar-brand" href="{BASE_URL}">Peliculas</a>
  </div>
  <div class="navbar-header">
    <a class="navbar-brand" href="generos">Generos</a>
  </div>
  {if $admin eq 1}
  <div class="navbar-header">
    <a class="navbar-brand" href="usuarios">Usuarios</a>
  </div>
  {/if}
  <ul class="nav navbar-nav navbar-right">
    <li><a href="logout"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
  </ul>
</nav>