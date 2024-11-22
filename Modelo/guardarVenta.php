<?php

    include 'conexion.php';

    $codigo =  $_POST["codigo_producto"];
    $producto = $_POST["nombre"];
    $precio = $_POST["precio_lista"];

    

    $query = "insert into ventas1 (producto,precio_lista,codigo_producto) value ('$producto','$precio','$codigo')";
    mysqli_query($conexion, $query);

    header("location: ../Vista/ventas.php");

?>