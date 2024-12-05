<?php
session_start();
include 'conexion.php';
    function guardarVenta($conexion){
        $codigo =  $_POST["codigo_producto"];
        $producto = $_POST["nombre"];
        $precio = $_POST["precio_lista"];

        $query = "insert into ventas1 (producto,precio_lista,codigo_producto) value ('$producto','$precio','$codigo')";
        mysqli_query($conexion, $query);
        header("location: ../Vista/ventas.php");
    }

    if (isset($_POST['tarjeta'])){
        guardarVenta($conexion);
    }

    function eliminarVenta ($conexion){
        $codigo = $_GET["id_ventas"];
        $query = "delete from ventas1 where id_ventas = $codigo ";
        mysqli_query($conexion, $query);
        header("Location: ../Vista/ventas.php");    
    }

    if(isset($_GET["id_ventas"])){
        eliminarVenta($conexion);
    }

    function ventas($conexion){
        $query = "SELECT *  FROM ventas1 ";
        $resultadoVentas = mysqli_query($conexion, $query);
        return $resultadoVentas;

        header("location: ../Vista/ventas.html");
    }
?>