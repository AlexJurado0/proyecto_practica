<?php

include '../Modelo/crud.php';

$id_usuario = $_SESSION['id_usuario']; 

// insertar producto
if (isset($_POST['insertar'])){
    $codigo = $_POST["codigo_producto"];
    $nombre = $_POST["nombre"];
    $precio_lista = $_POST["precio_lista"];

    insertarDatos($conexion, $id_usuario, $codigo, $nombre, $precio_lista);
   
    header("Location: ../Vista/productos.php");
}

// modificar producto
if (isset($_POST['modificar'])) {
    
    $codigo = $_POST["codigo_producto"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio_lista"];

    modificarDatos($conexion,$id_usuario, $codigo, $nombre, $precio);
    header("Location: ../Vista/productos.php"); 

}

// eliminar producto
if (isset($_GET["codigo_producto"])) {
    $codigo = $_GET["codigo_producto"];

    eliminarDatos($conexion, $codigo, $id_usuario);
    header("Location: ../Vista/productos.php");
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------//

// eliminar venta 
if (isset($_POST["eliminar"])) {
    $codigo = $_POST["codigo_producto"];  
    $cantidad = $_POST["cantidad"]; 

    eliminarVenta($conexion,$id_usuario, $codigo, $cantidad);

    header("Location: ../Vista/ventas.php");
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------//

//agregar producto al carrito
if (isset($_POST['tarjeta'])){
    $codigo =  $_POST["codigo_producto"];
    $producto = $_POST["nombre"];
    $precio = $_POST["precio_lista"];


    agregarProducto($conexion, $codigo, $producto, $precio, $id_usuario);
    header("location: ../Vista/paginaPrincipal.php");
}

// eliminar producto del carrito
if (isset($_POST['eliminarCompra'])) {
    $codigo = $_POST["codigo_producto"];  
    $cantidad = $_POST["cantidad"]; 

    eliminarCarrito($conexion, $codigo, $cantidad, $id_usuario);

    header("Location: ../Vista/carrito.php");
}

// realizar compra carrito
if (isset($_POST['realizarCompra'])) {

    guardarCompra($conexion,$id_usuario);
    realizarCompra($conexion, $id_usuario);
    header("Location: ../Vista/carrito.php");
}
?>