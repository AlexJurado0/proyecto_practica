<table class="table">
  <thead>
    <tr>
      <th class="text-start">Código</th>
      <th class="text-start">Producto</th>
      <th class="text-start">Precio</th>
      <th class="text-start">unidades</th>
      <th class="text-start">Precio total</th>
      <th class="text-start">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
      $carrito = mostrarCarrito($conexion, $id_usuario);
      $total = 0;
      while ($row = mysqli_fetch_assoc($carrito)) {

        $subtotal = $row["precio_lista"] * $row["cantidad"]; 
        $total += $subtotal; 
        echo '<tr">';
        echo '<td class="text-start col-1">' . ($row["codigo_producto"]) . '</td>';
        echo '<td class="text-start col-1">' . ($row["nombre_producto"]) . '</td>';
        echo '<td class="text-start col-1">' . ($row["precio_lista"]) . ' $</td>';
        echo '<td class="text-start col-1">' . ($row["cantidad"]) . '</td>';
        echo '<td class="text-start col-1">' . $subtotal . ' $</td>';
        echo '<td class="text-start">
                <form method="post" action="../Controlador/controladorCrud.php" class="d-flex justify-content-start align-items-center ms-1">
                  <input type="hidden" name="codigo_producto" value="' . $row['codigo_producto'] . '">
                  <input type="number" name="cantidad" class="form-control form-control-sm me-3" style="width: 90px;" placeholder="Cantidad" required>
                  <button type="submit" name="eliminarCompra" class="btn btn-danger btn-sm">Eliminar <i class="bi bi-trash3-fill"></i></button>
                </form>
              </td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>

<tfoot>
    <tr>
      <td class="text-end"><strong>Total a pagar:</strong></td>
      <td class="text-start col-1"><strong><?php echo $total; ?> $</strong></td>
      <td></td>
    </tr>
  </tfoot>
  
<?php
echo '<form method="post" action="../Controlador/controladorCrud.php"> 
<button type="submit" name="realizarCompra" class="btn btn-success m-2" onclick="return confirm(\'¿Estás seguro de que quieres realizar la compra?\')" >comprar</button>
</form>'

?>