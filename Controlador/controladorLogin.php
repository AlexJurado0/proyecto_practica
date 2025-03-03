<?php
require_once '../Modelo/modeloLogin.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    // Verificar el login con contraseña hasheada
    $resultado = verificarLogin($conexion, $usuario);

    if ($resultado && password_verify($contraseña, $resultado['contraseña'])) {
        $_SESSION['autentificado'] = "1";
        $_SESSION['rol'] = $resultado['rol'];
        $_SESSION['id_usuario'] = $resultado['id_usuario'];

        $id_usuario = $resultado['id_usuario'];

        // Consulta para obtener id_administrador
        $queryAdmin = "SELECT id_administrador FROM administrador WHERE id_usuario = '$id_usuario'";
        $resultadoAdmin = mysqli_query($conexion, $queryAdmin);

        $rowAdmin = mysqli_fetch_assoc($resultadoAdmin);
        $_SESSION['id_administrador'] = $rowAdmin['id_administrador'];

        if ($resultado['rol'] == 1) {
            header("Location: ../Vista/productos.php");
        } elseif ($resultado['rol'] == 2) {
            header("Location: ../Vista/paginaPrincipal.php");
        } else {
            header("Location: ../Vista/index.php");
        }
        exit();
    } else {
        header("Location: ../Vista/index.php");
        exit();
    }
}
?>

