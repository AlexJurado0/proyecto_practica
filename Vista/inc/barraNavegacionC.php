<!-- Clase "navbar": Define que es una barra de navegación 
"navbar-expand-lg": Permite que la barra se expanda en pantallas grandes -->
<nav class="navbar navbar-expand-lg navbar-expand-sm">
  <!-- Clase "container-fluid": Hace que la barra ocupe todo el ancho disponible -->
  <div class="container-fluid">
    <!-- Clase "navbar-brand": Estiliza el enlace como un logo o título de la barra -->
    <div class="collapse navbar-collapse" >
      <ul class="navbar-nav">
        <li>
          <a class="nav-link" href="paginaPrincipal.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Modelo/destruirSesion.php">Salir</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="./carrito.php" class="btn btn-success">
          Ver carrito <i class="bi bi-cart3"></i>
          </a>
        </li>
      </ul>
        
    </div>
  </div>
</nav>