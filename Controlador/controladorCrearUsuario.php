<?php
require_once '../Modelo/modeloLogin.php';

if (isset ($_POST['crearUsuario'])) {

    $usuario = $_POST["nombre"];
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);

    registrarLogin($conexion,$usuario,$contraseña);
    
    header("Location: ../Vista/index.php");
}

?>