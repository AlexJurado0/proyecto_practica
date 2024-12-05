<?php

$resultadoVentas = ventas($conexion);  ?>

<div class="container mt-5">
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Numero de venta</th>
                <th scope="col">Código</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio Lista</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultadoVentas)) { ?>
                <tr>
                    <td><?php echo $row["id_ventas"]; ?></td>
                    <td><?php echo $row["codigo_producto"]; ?></td>
                    <td><?php echo $row["producto"]; ?></td>
                    <td><?php echo $row["precio_lista"] . " $"; ?></td>
                    <td>
                        <a href="../Modelo/crud.php?id_ventas=<?php echo $row["id_ventas"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                            <i class="bi bi-trash3-fill"></i> Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
// Libera el resultado y cierra la conexión
mysqli_free_result($resultadoVentas);
mysqli_close($conexion);
?>