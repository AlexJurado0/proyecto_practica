<?php
    include '../Modelo/conexion.php';
    $codigo = $_POST["codigo_producto"];
    $nombre = $_POST["nombre"];
    $precio_lista = $_POST["precio_lista"];

    mysqli_query($conexion, "insert into productos (codigo_producto, nombre, precio_lista) VALUES ('$codigo','$nombre', '$precio_lista')");

    header("Location: ../Vista/paginaPrincipal.php");
?>