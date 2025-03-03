<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './inc/head.php'; ?>
    <title>Login</title>
</head>
<body>


    <!--justify-content-center  alinea el contenido en el centrolo de las columnas
        align-items-center alinea el contenido en el centro del bloque
        min-height establece el altura del bloque
    -->
    <div class="container d-flex justify-content-center align-items-center " style="height: 600px;">
        <!--width establece el tamaño del contenido-->
        <form method="post" action="../Controlador/controladorLogin.php" style=" width: 400px;">
            <!-- mb se encarga de dar una separacion entre elementos -->
            <div class="mb-4 row">
                <!-- col-form-label es utilizado para centrar los los campos con los elementos de entradas -->
                <label for="nombre" class="col-4 col-form-label" >  <i class="bi bi-person-circle"></i> Usuario</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre" autocomplete="off">
                </div>
            </div>
            <!-- mb se encarga de dar una separacion entre elementos -->
            <div class="mb-3 row">
                <!-- col-form-label es utilizado para centrar los los campos con los elementos de entradas -->
                <label for="inputPassword" class="col-4 col-form-label"> <i class="bi bi-incognito"></i> Contraseña</label>
                <div class="col-8">
                    <input type="password" class="form-control" id="inputPassword" name="contraseña" placeholder="Ingresa tu contraseña" autocomplete="off">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary col-12">Ingresar</button>
                <p class="mt-2">¿No tienes una cuenta? <a href="./crearUsuario.php">Crea una</a></p>
            </div>

        </form>
    </div>


<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>


