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

function registrarDatosPersonales($conexion, $nombre_completo, $edad, $telefono, $domicilio, $correo, $id_usuario){
    $query = "INSERT INTO cliente (nombre_cliente, edad, telefono, domicilio, correo, id_usuario, id_administrador) 
              VALUES ('$nombre_completo', '$edad', '$telefono', '$domicilio', '$correo', '$id_usuario', 1)";
    mysqli_query($conexion, $query);
}
?>
