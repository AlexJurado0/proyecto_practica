<?php include '../Modelo/ventas.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Ventas</title>
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
  <h1 class="text-center mt-4">Ventas</h1>


  <?php

// Obtiene los datos de la base de datos
echo '<div class="container mt-5">'; // Contenedor para centrar la tabla
echo '<table class="table table-striped table-bordered table-hover">';
echo '<thead class="thead-dark">
        <tr>
            <th scope="col">Numero de venta</th>
            <th scope="col">codigo</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio Lista</th>
            <th scope="col">Acciones</th>
        </tr>
      </thead>';


// Itera sobre los datos y genera las filas de la tabla
while ($row = mysqli_fetch_assoc($resultadoVentas)) {
    echo '<tr>';
    echo '<td>' . ($row["id_ventas"]) . '</td>';
    echo '<td>' . ($row["codigo_producto"]) . '</td>';
    echo '<td>' . ($row["producto"]) . '</td>';
    echo '<td>' . ($row["precio_lista"]) . ' $</td>';
    
    // botones dentro de cada fila
    echo '<td>
            <a href="../Modelo/eliminarVenta.php?id_ventas=' . $row["id_ventas"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este producto?\')"><i class="bi bi-trash3-fill"></i> Eliminar</a>
            
            </td>';
    
    echo '</tr>';
}

// Libera el resultado y cierra la conexión
mysqli_free_result($resultadoVentas);
mysqli_close($conexion);


echo '</table>';
echo '</div>';
?>
</body>
</html>