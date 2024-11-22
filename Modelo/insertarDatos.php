
<?php session_start();
include '../Controlador/verificarSesion.php';
include 'conexion.php';

// Obtén el id_usuario desde la sesión
$id_usuario = $_SESSION['id_usuario'];

$codigo = $_POST["codigo_producto"];
$nombre = $_POST["nombre"];
$precio_lista = $_POST["precio_lista"];

// Inserta los datos
$query = "insert into productos (codigo_producto, id_usuario, nombre, precio_lista) values ('$codigo', '$id_usuario', '$nombre', '$precio_lista')";
$result = mysqli_query($conexion, $query);

if ($result) {
    header("Location: ../Vista/productos.php");
    exit();
}
?>
