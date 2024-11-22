<?php 
session_start();
include 'Conexion.php';

//ejecutamos la sentencia sql
$user =$_POST["nombre"];
$pass=$_POST["contraseña"];
//$rol=$_POST["rol"];
$result=mysqli_query($conexion, "select * from login where usuario = '$user' AND contraseña = '$pass'");
//$var_dump($result);
//mostramos los registros

include '../Controlador/ControladorLogin.php';


?>
