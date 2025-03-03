<!DOCTYPE html>
<?php
include '../Controlador/controladorCrud.php';
?>
<html lang="en">
<head>
    <?php include './inc/head.php'; ?>
    <title>Ventas</title>
</head>
<body>
    
<?php include_once './inc/barraNavegacionA.php';?>

<h1 class="text-center mt-4">Ventas</h1>

<!-- Mostrar las ventas en una tabla -->
<?php include_once './inc/tablaVentas.php';?>

</body>
</html>