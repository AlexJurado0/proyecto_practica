<?php 
$resultado = mostrarDatos($conexion,$id_usuario);
?>
<br>
<div class="container py-3">
        <div class="row">
            <?php while ($producto = mysqli_fetch_assoc($resultado)){ ?>
                <div class="col-3 md-3">
                    <div class="card mb-4">
                        <div class="card-body ">
                            <h5 class="card-title d-flex justify-content-center" ><?php echo ($producto['nombre']) ?></h5>
                            <p class="card-text d-flex justify-content-center ">Precio: $<?php echo ($producto['precio_lista']) ?></p>
                            <form action="../Controlador/controladorCrud.php" method="post">
                              
                            
                            <input type="hidden" name="codigo_producto" value="<?php echo $producto['codigo_producto']; ?>">
                            <input type="hidden" name="nombre" value="<?php echo ($producto['nombre']); ?>">
                            <input type="hidden" name="precio_lista" value="<?php echo ($producto['precio_lista']); ?>">
                            <input type="hidden" name="tarjeta">
                            


                            <button name="agregar_producto" class="btn btn-primary w-50 container d-flex justify-content-center" onclick="return alert('Su producto ha sido agregado con éxito')">Agregar <i class="bi bi-cart-plus-fill ms-2"></i></button>

                            </form>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </div>
