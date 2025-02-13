<?php

// Obtiene los datos de la base de datos
$resultado = mostrarDatos($conexion,$id_usuario);



// "container" Clase de Bootstrap para envolver el contenido y centrarlo.
// "mt-5" Agrega un margen superior (mt = margin-top) para separar la tabla del encabezado.
echo '<div class="container mt-5">';

// "table" Aplica los estilos básicos de tabla de Bootstrap.
// "table-bordered" Agrega bordes a la tabla.
// "table-hover" Resalta la fila cuando el cursor pasa sobre ella.
echo '<table class="table table-bordered table-hover">';
echo '<thead>
        <tr>
            <th class="col-2">Código Producto</th>
            <th class="col-5">Nombre</th>
            <th class="col-2">Precio Lista</th>
            <th class="col-3">Acciones</th> <!-- Nueva columna para los botones -->
        </tr>
      </thead>';


// Itera sobre los datos y genera las filas de la tabla
while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . ($row["codigo_producto"]) . '</td>';
    echo '<td>' . ($row["nombre"]) . '</td>';
    echo '<td>' . ($row["precio_lista"]) . ' $</td>';
    
    // botones dentro de cada fila
    // btn le damos formato al boton
    // btn-warning le da el color amarillo
    // btn-sm lo hace mas chiquito
    echo '<td>
            <a href="modificar.php?codigo_producto=' . $row["codigo_producto"] . '" class="btn btn-warning btn-sm me-5"><i class="bi bi-pen"></i> Modificar</a>
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

