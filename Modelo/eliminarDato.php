<?php session_start();


include 'conexion.php';

$codigo = $_GET["codigo_producto"];

$query = "delete from productos where codigo_producto = $codigo ";

mysqli_query($conexion, $query);

header("Location: ../Vista/paginaPrincipal.php");
?>