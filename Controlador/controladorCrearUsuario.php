<?php
require_once '../Modelo/modeloLogin.php';

if (isset($_POST['crearUsuario'])) {
    // Datos login
    $usuario = $_POST["nombre"];
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);

    // Datos personales
    $nombre_completo = $_POST["nombre_completo"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"];  
    $domicilio = $_POST["domicilio"];  
    $correo = $_POST["correo"];  

    // Verificar si el nombre de usuario ya está registrado
    $queryVerificar = "SELECT * FROM login WHERE usuario = '$usuario'";
    $resultadoVerificar = mysqli_query($conexion, $queryVerificar);

    if (mysqli_num_rows($resultadoVerificar) > 0) {
        // Si el nombre de usuario ya existe, mostrar mensaje de error
        $_SESSION['error'] = "El nombre de usuario ya está registrado. Por favor, elige otro.";
        header("Location: ../Vista/crearUsuario.php");
        exit();
    } else {
        // Si el nombre de usuario no existe, proceder con el registro

        // Registrar login (esto te da el id_usuario generado)
        $queryLogin = "INSERT INTO login (usuario, contraseña, rol) VALUES ('$usuario', '$contraseña', 2)";
        if (mysqli_query($conexion, $queryLogin)) {
            // Obtener el id_usuario generado
            $id_usuario = mysqli_insert_id($conexion);

            // Registrar los datos personales con el id_usuario
            registrarDatosPersonales($conexion, $nombre_completo, $edad, $telefono, $domicilio, $correo, $id_usuario);
            
            header("Location: ../Vista/index.php");
            exit();
        }
    }
}