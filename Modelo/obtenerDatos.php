<?php session_start();

include 'conexion.php';

$id_usuario = $_SESSION['id_usuario'];
$query = "SELECT *  FROM productos p INNER JOIN login l ON p.id_usuario = l.id_usuario WHERE p.id_usuario = '$id_usuario'; " ;
$resultado = mysqli_query($conexion, $query);

?>
