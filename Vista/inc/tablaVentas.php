<?php
$resultadoVentas = mostrarVentas($conexion, $id_usuario);

// Inicializa una variable para guardar el número de venta anterior
$numeroVentaAnterior = null;
$totalVenta = 0; // Variable para almacenar el total de la venta

?>

<div class="container mt-5">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="col-1">N° Venta</th>
                <th class="col-1">Código</th>
                <th class="col-3">Producto</th>
                <th class="col-1">Cantidad</th>
                <th class="col-1">Precio Lista</th> 
                <th class="col-1">Total</th> 
                <th class="col-1">ID Usuario</th>
                <th class="col-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultadoVentas)) { 
                // Verifica si el número de venta ha cambiado
                if ($numeroVentaAnterior !== $row["numero_venta"]) {
                    // Si el número de venta cambió, muestra el resumen de la venta anterior
                    if ($numeroVentaAnterior !== null) {
                        // Mostrar el total de la venta al final de la última línea de la venta
                        echo '<tr><td colspan="7" class="text-center"><strong>Total Venta: ' .$totalVenta . " $</strong></td></tr>";
                    }
                    // Resetea el total de la venta y actualiza el número de venta
                    $totalVenta = 0; // Resetea el total de la venta
                }
                // Suma el total de la venta
                $totalVenta += $row["total"];

                ?>
                <tr>
                    <td><?php echo $row["numero_venta"]; ?></td>
                    <td><?php echo $row["codigo_producto"]; ?></td>
                    <td><?php echo $row["producto"]; ?></td>
                    <td><?php echo $row["cantidad"]; ?></td>
                    <td><?php echo $row["precio_lista"] . " $"; ?></td>
                    <td><?php echo $row["total"] . " $"; ?></td>
                    <td><?php echo $row["id_usuario"]; ?></td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">
                            <form method="post" action="../Controlador/controladorCrud.php" class="d-flex justify-content-start align-items-center ms-1">
                                <input type="hidden" name="codigo_producto" value="<?php echo $row['codigo_producto']; ?>">
                                <input type="hidden" name="numero_venta" value="<?php echo $row['numero_venta']; ?>">
                                <input type="number" name="cantidad" class="form-control form-control-sm me-3" style="width: 90px;" placeholder="Cantidad" required min="1">
                                <button type="submit" name="eliminar" class="btn btn-danger btn-sm">eliminar  <i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php 
                // Actualiza el número de venta anterior
                $numeroVentaAnterior = $row["numero_venta"];
            } ?>
            
            <!-- Mostrar el total de la última venta -->
            <?php if ($numeroVentaAnterior !== null) { ?>
                <tr>
                    <td colspan="7" class="text-center"><strong>Total Venta: <?php echo $totalVenta. " $"; ?></strong></td>
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
