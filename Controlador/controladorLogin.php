<?php
require_once '../Modelo/modeloLogin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    // Verificar el login
    $resultado = verificarLogin($conexion, $usuario, $contraseña);

    if (mysqli_num_rows($resultado) === 1) {
        $row = mysqli_fetch_assoc($resultado);
        
        
        $_SESSION['autentificado'] = "1";
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['id_usuario'] = $row['id_usuario'];

        $id_usuario = $row['id_usuario'];
        
        // Consulta para obtener id_administrador
        $queryAdmin = "SELECT id_administrador FROM administrador WHERE id_usuario = '$id_usuario'";
        $resultadoAdmin = mysqli_query($conexion, $queryAdmin);

        $rowAdmin = mysqli_fetch_assoc($resultadoAdmin);
        $_SESSION['id_administrador'] = $rowAdmin['id_administrador'];

        
        if ($row['rol'] == 1) {
            header("Location: ../Vista/productos.php");  // Página del administrador
        } elseif ($row['rol'] == 2) {
            header("Location: ../Vista/paginaPrincipal.php"); // Página del Cliente
        } else {
            header("Location: ../Vista/index.php"); // Si el rol no es válido, redirigir al inicio
        }
        exit();
    } else {
        header("Location: ../Vista/index.php");
        exit();
    }
}

?>

