<?php
session_start(); // Inicia la sesión

include '../Modelo/conexion.php';

$user = $_POST["nombre"];
$pass = $_POST["contraseña"];

// Consulta para verificar las credenciales
$query = "SELECT id_usuario FROM login WHERE usuario = '$user' AND contraseña = '$pass'";
$result = mysqli_query($conexion, $query);

// Verifica si las credenciales son válidas
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["autentificado"] = "1"; // Marca al usuario como autenticado
    $_SESSION["id_usuario"] = $row["id_usuario"]; // Guarda el id_usuario en la sesión
    header("Location: ../Vista/paginaPrincipal.php");
    exit();
} else {
    header("Location: ../Vista/index.html?error=1");
    exit();
}
