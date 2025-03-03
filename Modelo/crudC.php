<?php
session_start();
include 'conexion.php';
include 'seguridad.php';

    // Mostrar productos 

    function mostrarDatos1($conexion, $id_usuario) {

        
        // !!!!!!! id_administrador cambiar al crear nuevo administrador !!!!!!!
        $query = "SELECT * FROM productos where id_administrador = 1";
        
        $resultado = mysqli_query($conexion, $query);
        return $resultado;
    }
    
   
    
   
    //-------------------------------------------------------------------------------------------------------------------------------------------------------------//

    // Agregar producto carrito
    function agregarProducto($conexion, $codigo, $producto, $precio, $id_usuario) {
        // Verificar si el producto ya está en el carrito
        $query = "SELECT * FROM carrito WHERE codigo_producto = '$codigo'  && id_usuario = '$id_usuario'";
        $resultadoVerificacion = mysqli_query($conexion, $query);
    
        if (mysqli_num_rows($resultadoVerificacion) > 0) {
            // Si ya existe, actualizamos la cantidad
            $query = "UPDATE carrito SET cantidad = cantidad + 1 WHERE codigo_producto = '$codigo'  && id_usuario = '$id_usuario'";
        } else {
            // Si no existe, agregamos el producto
            $cantidad = 1;
            $total = $precio * $cantidad;
            $query = "INSERT INTO carrito (nombre_producto, cantidad, precio_lista, codigo_producto, id_usuario) 
                      VALUES ('$producto','$cantidad','$precio', '$codigo', '$id_usuario')";
        }
    
        mysqli_query($conexion, $query);
    }
    


    // Mostrar carrito
    function mostrarCarrito($conexion, $id_usuario) {

        $query = "SELECT * from carrito where id_usuario = '$id_usuario'";
        
        $resultadoCarrito = mysqli_query($conexion, $query);
        return $resultadoCarrito; 
    }
    
    

    // Eliminar producto del carrito
    function eliminarCarrito($conexion, $codigo, $cantidad, $id_usuario) {
        $query = mysqli_query($conexion, "SELECT cantidad FROM carrito WHERE codigo_producto = '$codigo'  && id_usuario = '$id_usuario'");
        $consulta = mysqli_fetch_assoc($query)['cantidad'];
    
        if ($cantidad > 0) {
            if ($consulta > $cantidad) {
                // Reducir la cantidad
                $query = "UPDATE carrito SET cantidad = cantidad - $cantidad WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario'";
            } else {
                // Eliminar el producto si la cantidad es igual o menor
                $query = "DELETE FROM carrito WHERE codigo_producto = '$codigo'  && id_usuario = '$id_usuario'";
            }
        } else {
            header("Location: ../Vista/carrito.php");
        }
    
        mysqli_query($conexion, $query);
    }
    

    // Guardar Compra Carrito
    function guardarCompra($conexion, $id_usuario) {

        // !!!!!!! id_administrador cambiar al crear nuevo administrador !!!!!!!
        
        $queryUltimaVenta = "SELECT MAX(numero_venta) AS ultimo_numero FROM ventas1 WHERE id_administrador = 1";
        $resultadoUltimaVenta = mysqli_query($conexion, $queryUltimaVenta);
        if (!$resultadoUltimaVenta) {
            echo "Error al obtener la última venta: " . mysqli_error($conexion);
            return;
        }
        $rowUltimaVenta = mysqli_fetch_assoc($resultadoUltimaVenta);
    
        // Asignar el número de venta, si existe, incrementar en 1; si no, comenzar desde 1
        if ($rowUltimaVenta['ultimo_numero']) {
            $numero_venta = $rowUltimaVenta['ultimo_numero'] + 1;
        } else {
            $numero_venta = 1;
        }
    
        // Obtener los productos del carrito del usuario
        $query = "SELECT c.codigo_producto, c.cantidad, c.nombre_producto, c.precio_lista, a.id_administrador 
                  FROM carrito c
                  INNER JOIN cliente cl ON c.id_usuario = cl.id_usuario
                  INNER JOIN administrador a ON cl.id_administrador = a.id_administrador
                  WHERE c.id_usuario = $id_usuario";
                  
        $resultadoCarrito = mysqli_query($conexion, $query);
        if (!$resultadoCarrito) {
            echo "Error al obtener el carrito: " . mysqli_error($conexion);
            return;
        }
    
        if (mysqli_num_rows($resultadoCarrito) > 0) {
            while ($row = mysqli_fetch_assoc($resultadoCarrito)) {
                $codigo_producto = $row['codigo_producto'];
                $cantidad = $row['cantidad'];
                $nombre_producto = $row['nombre_producto'];
                $precio_lista = $row['precio_lista'];
                $total = $cantidad * $precio_lista;
    
                // !!!!!!! id_administrador cambiar al crear nuevo administrador !!!!!!!
                $queryInsert = "INSERT INTO ventas1 (numero_venta, cantidad, producto, precio_lista, total, codigo_producto, id_usuario, id_administrador) 
                                VALUES ($numero_venta, $cantidad, '$nombre_producto', $precio_lista, $total, $codigo_producto, $id_usuario, 1)";
                if (!mysqli_query($conexion, $queryInsert)) {
                    echo "Error al insertar en la tabla ventas1: " . mysqli_error($conexion);
                }
            }
        } else {
            echo "No hay productos en el carrito.";
        }
    }
    
    // Realizar compra del carrito
    function realizarCompra($conexion, $id_usuario) {
        $queryDelete = "DELETE FROM carrito WHERE id_usuario = $id_usuario";
        if (!mysqli_query($conexion, $queryDelete)) {
            echo "Error al eliminar el carrito: " . mysqli_error($conexion);
        }
    }
    
?>