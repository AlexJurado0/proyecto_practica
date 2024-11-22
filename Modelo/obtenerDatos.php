<?php

include 'conexion.php';
$query = "select * from productos";
$resultado = mysqli_query($conexion, $query);

return $resultado;
?>
