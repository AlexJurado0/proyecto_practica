<?php

$resultadoVentas = mostrarVentas($conexion, $id_usuario);  ?>

<div class="container mt-5">
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Numero de venta</th>
                <th scope="col">Código</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Lista</th> 
                <th scope="col">total</th> 
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultadoVentas)) { ?>
                <tr>
                    <td><?php echo $row["id_ventas"]; ?></td>
                    <td><?php echo $row["codigo_producto"]; ?></td>
                    <td><?php echo $row["producto"]; ?></td>
                    <td><?php echo $row["cantidad"]; ?></td>
                    <td><?php echo $row["precio_lista"] . " $"; ?></td>
                    <td><?php echo $row["total"] . " $"; ?></td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">
                            
                            <form method="post" action="../Controlador/controladorCrud.php" class="ms-1">
                                <input type="hidden" name="id_ventas" value="<?php echo $row['id_ventas']; ?>">
                                <input type="number" name="cantidad" class="form-control form-control-sm" style="width: 80px;" placeholder="Cantidad" required>
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