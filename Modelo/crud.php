<?php
session_start();
include 'conexion.php';

    //mostrar producto
    function mostrarDatos($conexion, $id_usuario){
        $query = "SELECT *  FROM productos p INNER JOIN login l ON p.id_usuario = l.id_usuario WHERE p.id_usuario = '$id_usuario'; " ;
        $resultado = mysqli_query($conexion, $query);
        return $resultado;
    }
    
    //Inserta producto
    function insertarDatos($conexion, $id_usuario, $codigo, $nombre, $precio_lista) {
        $query = "SELECT codigo_producto, id_usuario FROM productos WHERE codigo_producto = '$codigo'  && id_usuario = '$id_usuario' " ;
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) == 0) {
            $insertQuery = "INSERT INTO productos (codigo_producto, id_usuario, nombre, precio_lista) 
                            VALUES ('$codigo', '$id_usuario', '$nombre', '$precio_lista')";
            mysqli_query($conexion, $insertQuery);
        } 
    }

    //modificar producto
    function modificarDatos($conexion,$id_usuario, $codigo, $nombre, $precio){
        $query = "update productos SET nombre = '$nombre', precio_lista = '$precio' WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario'";
        mysqli_query($conexion,$query);
           
    }

    //eliminar producto
    function eliminarDatos ($conexion, $codigo, $id_usuario){
        $query = "delete from productos where codigo_producto = '$codigo' && id_usuario = $id_usuario ";
        mysqli_query($conexion, $query);
    }
   

    //-------------------------------------------------------------------------------------------------------------------------------------------------------------//
    
    //eliminar venta
    function eliminarVenta($conexion, $id_usuario,$codigo, $cantidad) {
        
        $query = mysqli_query($conexion, "SELECT cantidad FROM ventas1 WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario'");
        $consulta = mysqli_fetch_assoc($query)['cantidad'];

        if ($cantidad > 0) {
            if ($consulta > $cantidad) {
                $query = "UPDATE ventas1 SET cantidad = cantidad - $cantidad , total = total - precio_lista * $cantidad WHERE codigo_producto = '$codigo' ";
            }else {
                $query = "delete from ventas1 where codigo_producto = $codigo && id_usuario = '$id_usuario'";
            }
        }else {
            header("Location: ../Vista/ventas.php");
        }
        
        $result = mysqli_query($conexion, $query);
        
    }

    //mostrar ventas
        function mostrarVentas($conexion, $id_usuario) {
            $query = "SELECT * FROM ventas1 v inner join login l on v.id_usuario = l.id_usuario where v.id_usuario = '$id_usuario'; " ;
            $resultadoVentas = mysqli_query($conexion, $query);
            return $resultadoVentas;
    }


    //-------------------------------------------------------------------------------------------------------------------------------------------------------------//

    // Agregar producto carrito
    function agregarProducto($conexion, $codigo, $producto, $precio, $id_usuario){
        $query = "SELECT * FROM carrito WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario'";
        $resultadoVerificacion = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultadoVerificacion) > 0) {
            $query = "update carrito SET cantidad = cantidad + 1 where codigo_producto = '$codigo' && id_usuario = '$id_usuario'";
        } else {
            $cantidad = 1;
            $total = $precio * $cantidad;
            $query = "insert into carrito (nombre_producto, cantidad, precio_lista, codigo_producto, id_usuario) 
            VALUES ('$producto','$cantidad ','$precio', '$codigo', '$id_usuario')";
        }

        mysqli_query($conexion, $query);
    }


    // mostrar carrito
    function mostrarCarrito($conexion, $id_usuario){
        $query = "SELECT * FROM carrito c inner join login l on c.id_usuario = l.id_usuario where c.id_usuario = '$id_usuario';";
        $resulatadoCarrito = mysqli_query($conexion, $query);
        return $resulatadoCarrito; 
    }
    

    // eliminar producto del carrito
    function eliminarCarrito($conexion, $codigo, $cantidad, $id_usuario){
        $query = mysqli_query($conexion, "SELECT cantidad FROM carrito WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario'");
        $consulta = mysqli_fetch_assoc($query)['cantidad'];

        if ($cantidad > 0) {
            if ($consulta > $cantidad) {
                $query = "UPDATE carrito SET cantidad = cantidad - $cantidad WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario'";
            }else {
                $query = "delete from carrito where codigo_producto = $codigo && id_usuario = $id_usuario";
            }
        }else {
            header("Location: ../Vista/carrito.php");
        }
        
        $result = mysqli_query($conexion, $query);
    }

    // Guardar Compra Carrito
    function guardarCompra($conexion, $id_usuario) {
        // 1. Obtener todos los productos del carrito del usuario
        $Query ="SELECT c.codigo_producto, c.cantidad, p.nombre, p.precio_lista 
                        FROM carrito c
                        JOIN productos p ON c.codigo_producto = p.codigo_producto
                        WHERE c.id_usuario = $id_usuario";
        
        $resultadoCarrito = mysqli_query($conexion, $Query);
        
        // 2. Recorrer todos los productos del carrito
        while ($row = mysqli_fetch_assoc($resultadoCarrito)) {
            $codigo_producto = $row['codigo_producto'];
            $cantidad = $row['cantidad'];
            $nombre_producto = $row['nombre'];
            $precio_lista = $row['precio_lista'];
            $total = $cantidad * $precio_lista;
    
            // 3. Verificar si el producto ya existe en ventas1
            $Query = "SELECT codigo_producto FROM ventas1 WHERE codigo_producto = $codigo_producto && id_usuario = $id_usuario";
            $resultadoVentaExistente = mysqli_query($conexion, $Query);
    
            if (mysqli_num_rows($resultadoVentaExistente) > 0) {
                // Si el producto ya existe, actualizar la cantidad y el total
                $Query = "UPDATE ventas1 SET cantidad = cantidad + $cantidad, total = cantidad * precio_lista
                                WHERE codigo_producto = $codigo_producto && id_usuario = $id_usuario";
                mysqli_query($conexion, $Query);
            } else {
                // Si el producto no existe, insertarlo en ventas1
                $Query = "INSERT INTO ventas1 (id_usuario, codigo_producto, producto, cantidad, precio_lista, total) 
                                VALUES ($id_usuario, $codigo_producto, '$nombre_producto', $cantidad, $precio_lista, $total)";
                mysqli_query($conexion, $Query);
            }
        }

    }

    // realizar compra del carrito
    function realizarCompra($conexion,$id_usuario){
        mysqli_query($conexion, "DELETE FROM carrito where id_usuario = $id_usuario");
    }


    
    
?>