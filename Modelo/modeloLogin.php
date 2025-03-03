<?php
session_start(); 
include 'conexion.php';

function verificarLogin($conexion, $usuario) {
    $query = "SELECT id_usuario, rol, contraseña FROM login WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $query);
    
    if ($resultado && mysqli_num_rows($resultado) === 1) {
        return mysqli_fetch_assoc($resultado);
    }
    return false;
}



function registrarLogin($conexion, $usuario, $contraseña){

    $query = "INSERT INTO login (usuario, contraseña, rol) VALUES ('$usuario','$contraseña',2)";
    mysqli_query($conexion, $query);
}

?>
