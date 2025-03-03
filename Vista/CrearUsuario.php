<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './inc/head.php'; ?>
    <title>Registro</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 700px;">
        
        <form method="post" action="../Controlador/controladorCrearUsuario.php" style="width: 400px;">
            
            
            <h4 class="text-center mb-4">Datos de Login</h4>
            <div class="mb-4 row">
                <label for="nombre" class="col-5 col-form-label"></i> Usuario</label>
                <div class="col-7">
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre de usuario" autocomplete="off" required>
                </div>
            </div>
            <div class="mb-4 row">
                <label for="inputPassword" class="col-5 col-form-label">Contraseña</label>
                <div class="col-7">
                    <input type="password" class="form-control" name="contraseña" placeholder="Ingresa tu contraseña" autocomplete="off" required>
                </div>
            </div>
<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

            <h4 class="text-center mb-4">Datos Personales</h4>
            <div class="mb-4 row">
                <label for="nombre_completo" class="col-5 col-form-label">Nombre Completo</label>
                <div class="col-7">
                    <input type="text" class="form-control" name="nombre_completo" placeholder="Ingresa tu nombre completo" autocomplete="off" required>
                </div>
            </div>
            <div class="mb-4 row">
                <label for="edad" class="col-5 col-form-label">Edad</label>
                <div class="col-7">
                    <input type="number" class="form-control" name="edad" placeholder="Ingresa tu edad" min="1" required>
                </div>
            </div>
            <div class="mb-4 row">
                <label for="telefono" class="col-5 col-form-label">Teléfono</label>
                <div class="col-7">
                    <input type="text" class="form-control" name="telefono" placeholder="Ingresa tu teléfono" required>
                </div>
            </div>
            <div class="mb-4 row">
                <label for="domicilio" class="col-5 col-form-label">Domicilio</label>
                <div class="col-7">
                    <input type="text" class="form-control" name="domicilio" placeholder="Ingresa tu domicilio" required>
                </div>
            </div>
            <div class="mb-4 row">
                <label for="correo" class="col-5 col-form-label">Correo</label>
                <div class="col-7">
                    <input type="email" class="form-control" name="correo" placeholder="Ingresa tu correo electrónico" required>
                </div>
            </div>

            <!-- Botón de registro -->
            <div>
                <button type="submit" class="btn btn-primary col-12">Registrar</button>
            </div>

            <input type="hidden" name="crearUsuario">
        </form>
    </div>

<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
