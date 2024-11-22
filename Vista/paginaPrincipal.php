<?php include '../Modelo/obtenerDatos.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Inicio</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="paginaPrincipal.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="productos.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="proveedores.php">Proveedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ventas.php">Ventas</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<h1 class="text-center mt-4">Inicio</h1>

<br>


<!-- tarjetas -->
<div class="container py-3">
        <div class="row">
            <?php while ($producto = mysqli_fetch_assoc($resultado)){ ?>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title container d-flex justify-content-center" ><?php echo ($producto['nombre']) ?></h5>
                            <p class="card-text container d-flex justify-content-center ">Precio: $<?php echo ($producto['precio_lista']) ?></p>
                            <form action="../Modelo/guardarVenta.php" method="post">
                              
                            <input type="hidden" name="codigo_producto" value="<?php echo $producto['codigo_producto']; ?>">
                            <input type="hidden" name="nombre" value="<?php echo ($producto['nombre']); ?>">
                            <input type="hidden" name="precio_lista" value="<?php echo ($producto['precio_lista']); ?>">

                            <button name="agregar_producto" class="btn btn-primary w-50  container d-flex justify-content-center ">Agregar</button>

                            </form>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </div>

<!-- Carrito de compras -->

</table>
</body>
</html>
