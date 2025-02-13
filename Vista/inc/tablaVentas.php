<?php

$resultadoVentas = mostrarVentas($conexion, $id_usuario);  ?>

<div class="container mt-5 ">
    <table class="table  table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="col-1">Código</th>
                <th class="col-3">Producto</th>
                <th class="col-2">Cantidad vendida</th>
                <th class="col-1">Precio Lista</th> 
                <th class="col-1">total</th> 
                <th class="col-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultadoVentas)) { ?>
                <tr>
                    <td><?php echo $row["codigo_producto"]; ?></td>
                    <td><?php echo $row["producto"]; ?></td>
                    <td><?php echo $row["cantidad"]; ?></td>
                    <td><?php echo $row["precio_lista"] . " $"; ?></td>
                    <td><?php echo $row["total"] . " $"; ?></td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">
                            
                            <form method="post" action="../Controlador/controladorCrud.php" class="d-flex justify-content-start align-items-center ms-1">
                                <input type="hidden" name="codigo_producto" value="<?php echo $row['codigo_producto']; ?>">
                                <input type="number" name="cantidad" class="form-control form-control-sm me-3" style="width: 90px;" placeholder="Cantidad" required>
                                <button type="submit" name="eliminar" class="btn btn-danger btn-sm">eliminar  <i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </div>
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