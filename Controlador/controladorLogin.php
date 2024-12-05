<?php
require_once '../Modelo/modeloLogin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $resultado = verificarLogin($conexion, $usuario, $contraseña);

    if (mysqli_num_rows($resultado) === 1) {
        $row = mysqli_fetch_assoc($resultado);
        $_SESSION['autentificado'] = "1";
        $_SESSION['id_usuario'] = $row['id_usuario']; 
        header("Location: ../Vista/paginaPrincipal.php");
        exit();
    } else {
        header("Location: ../Vista/index.php");
        exit();
    }
}
?>