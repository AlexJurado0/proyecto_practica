<table class = "table">
  <tr>
    <th>codigo</th>
    <th>producto</th>
    <th>precio</th>
  </tr>

<?php 
  
  $resultadoVentas = ventas($conexion);
  while ($row = mysqli_fetch_assoc($resultadoVentas)) {
    echo '<tr>';
    echo '<td>' . ($row["codigo_producto"]) . '</td>';
    echo '<td>' . ($row["producto"]) . '</td>';
    echo '<td>' . ($row["precio_lista"]) . ' $</td>';
    
    // botones dentro de cada fila
    echo '<td>
            <a href="../Modelo/crud.php?id_ventas=' . $row["id_ventas"] . '" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Eliminar</a>
            
            </td>';
    
    echo '</tr>';
}
?>