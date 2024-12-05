<?php
session_start();
include 'conexion.php';

    function mostrarDatos($conexion){
        $id_usuario = $_SESSION['id_usuario'];  
        $query = "SELECT *  FROM productos p INNER JOIN login l ON p.id_usuario = l.id_usuario WHERE p.id_usuario = '$id_usuario'; " ;
        $resultado = mysqli_query($conexion, $query);
        return $resultado;
    }

    
    function insertarDatos($conexion) {
        $id_usuario = $_SESSION['id_usuario'];
        $codigo = $_POST["codigo_producto"];
        $nombre = $_POST["nombre"];
        $precio_lista = $_POST["precio_lista"];

        // Inserta los datos
        $query = "insert into productos (codigo_producto, id_usuario, nombre, precio_lista) values ('$codigo', '$id_usuario', '$nombre', '$precio_lista')";
        $result = mysqli_query($conexion, $query);

        if ($result) {
           header("Location: ../Vista/productos.php");
            exit();
        }
    }

    if (isset($_POST['insertar'])){
        insertarDatos($conexion);
    }
    
    function modificarDatos($conexion){
        $codigo = $_POST["codigo_producto"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio_lista"];

        $query = "update productos SET nombre = '$nombre', precio_lista = '$precio' WHERE codigo_producto = '$codigo'";
        
        mysqli_query($conexion,$query);
        
        header("Location: ../Vista/productos.php");   
    }

    if (isset($_POST['modificar'])) {
        modificarDatos($conexion);
    }

    function eliminarDatos ($conexion){
        $codigo = $_GET["codigo_producto"];
        $query = "delete from productos where codigo_producto = $codigo ";
        mysqli_query($conexion, $query);
        header("Location: ../Vista/productos.php");
    }

    if(isset($_GET["codigo_producto"])){
        eliminarDatos($conexion);
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

    function ventas($conexion){
        $query = "SELECT *  FROM ventas1 ";
        $resultadoVentas = mysqli_query($conexion, $query);
        return $resultadoVentas;

        header("location: ../Vista/ventas.html");
    }
?>