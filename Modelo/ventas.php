<?php
   include 'conexion.php';
    $query = "SELECT *  FROM ventas1 ";

    $resultadoVentas = mysqli_query($conexion, $query);
    
    return $resultadoVentas;

    header("location: ../Vista/ventas.html");

?>