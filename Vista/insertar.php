<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './inc/head.php'; ?>
    <title>Insertar Producto</title>
</head>
<body>

    

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
        <form action="../Controlador/controladorCrud.php" method="post" align="center" class="w-50">
            <!-- Código Producto -->
            <div class="mb-3">
                <label for="codigo_producto" class="form-label">Código Producto</label>
                <input type="number" name="codigo_producto" id="codigo_producto" class="form-control" required>
            </div>
            
            <!-- Nombre del Producto -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Producto</label>
                <input type="text" name="nombre" id="nombre" class="form-control"  required>
            </div>
    
            <!-- Precio Lista -->
            <div class="mb-3">
                <label for="precio_lista" class="form-label">Precio Lista</label>
                <input type="number" name="precio_lista" id="precio_lista" class="form-control" step="0.01" required>
            </div>

            <!-- campo oculto -->
            
            <input type="hidden" name="insertar">

            <!-- Botón de Submit -->
            <button type="submit" class="btn btn-success w-100">Insertar</button>
        </form>
    </div>
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
