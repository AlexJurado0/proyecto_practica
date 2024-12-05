<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './inc/head.php'; ?>
    <title>Login</title>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center " style="min-height: 600px;">
        <form method="post" action="../Modelo/ModeloLogin.php" style="width: 100%; max-width: 400px;">
            <div class="mb-3 row">
                
                <label for="staticEmail" class="col-sm-4 col-form-label" >  <i class="bi bi-person-circle"></i> Usuario</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="nombre" placeholder="Ingresa tu nombre">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-4 col-form-label"> <i class="bi bi-incognito"></i> Contraseña</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" name="contraseña" placeholder="Ingresa tu contraseña">
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>


<script src="/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
