<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './inc/head.php'; ?>
    <title>Modificar</title>
   
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center " style="min-height: 100px;">
    <form action="../Controlador/controladorCrud.php" method="post" >

        <label for="codigo_producto">Codigo Producto</label>
        <input type="number" name="codigo_producto" id="codigo_producto" value="codigo_producto" required>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="precio_lista">precio_lista</label>
        <input type="text" name="precio_lista" id="precio_lista" required>

        <input type="hidden" name="modificar" >

        <button type="submit" class="btn btn-warning">Modificar Datos</button>
    </form>
    </div>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>