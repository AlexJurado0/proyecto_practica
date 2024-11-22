<?php session_start();


include 'conexion.php';

$codigo = $_GET["id_ventas"];

$query = "delete from ventas1 where id_ventas = $codigo ";

mysqli_query($conexion, $query);

header("Location: ../Vista/ventas.php");
?>