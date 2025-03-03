<?php
session_start(); 
include 'conexion.php';


function verificarLogin($conexion, $usuario, $contraseña) {
    $query = "SELECT id_usuario, rol FROM login WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}
?>
