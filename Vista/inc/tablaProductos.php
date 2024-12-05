<?php

$resultado = mostrarDatos($conexion,$id_usuario);



// Obtiene los datos de la base de datos
echo '<div class="container mt-5">'; // Contenedor para centrar la tabla
echo '<table class="table table-striped table-bordered table-hover">';
echo '<thead class="thead-dark">
        <tr>
            <th scope="col">Código Producto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio Lista</th>
            <th scope="col">Acciones</th> <!-- Nueva columna para los botones -->
        </tr>
      </thead>';


// Itera sobre los datos y genera las filas de la tabla
while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . ($row["codigo_producto"]) . '</td>';
    echo '<td>' . ($row["nombre"]) . '</td>';
    echo '<td>' . ($row["precio_lista"]) . ' $</td>';
    
    // botones dentro de cada fila
    echo '<td>
            <a href="modificar.php?=codigo_producto' . $row["codigo_producto"] . '" class="btn btn-warning btn-sm"><i class="bi bi-pen"></i> Modificar</a>
            <a href="../Controlador/controladorCrud.php?codigo_producto=' . $row["codigo_producto"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este producto?\')"><i class="bi bi-trash3-fill"></i> Eliminar</a>
            
            </td>';
    
    echo '</tr>';
}

// Libera el resultado y cierra la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);


echo '</table>';
echo '</div>';


?>

<!-- Botón para insertar datos -->
<div class="text-center mt-3">
    <a href="insertar.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Insertar Datos</a>
</div>