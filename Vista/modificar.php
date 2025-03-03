<?php
session_start();

include '../Modelo/seguridad.php';

// Verifica si se recibió el código del producto
if (isset($_GET['codigo_producto'])) {
    $codigo_producto = $_GET['codigo_producto'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './inc/head.php';?>

    <title>Modificar</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 200px;">
        <form action="../Controlador/controladorCrud.php" method="post">
            <input type="hidden" name="codigo_producto" id="codigo_producto" value="<?php echo ($codigo_producto); ?>"y>
            
            <label for="nombre">Nombre</label>
            <input class="col-3 me-4 mx-2"type="text" name="nombre" id="nombre" autocomplete="off" required>

            <label for="precio_lista ">Precio Lista</label>
            <input class="me-4 mx-2"type="text" name="precio_lista" id="precio_lista" autocomplete="off" required>

            <input type="hidden" name="modificar">

            <button  type="submit" class="btn btn-warning btn-sm mb-1">Modificar Datos</button>
        </form>
    </div>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
