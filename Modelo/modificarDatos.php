<?php

    include 'conexion.php';

    $codigo = $_POST["codigo_producto"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio_lista"];

    $query = "update productos SET nombre = '$nombre', precio_lista = '$precio' WHERE codigo_producto = '$codigo'";

    mysqli_query($conexion,$query);

    header("Location: ../Vista/paginaPrincipal.php");

?>