<?php

include 'conexion.php';
include 'seguridad.php';

    // Mostrar productos
    function mostrarDatos($conexion, $id_usuario){
        $query = "SELECT * FROM productos WHERE id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conexion, $query);
        return $resultado;
    }
    
    // Insertar producto
    function insertarDatos($conexion, $id_usuario, $codigo, $nombre, $precio_lista,) {
    
        // Verificar si el producto ya existe para ese usuario
        $query = "SELECT codigo_producto FROM productos WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario'";
        $resultado = mysqli_query($conexion, $query);
    
        // !!!!!!! id_administrador cambiar al crear nuevo administrador !!!!!!!
        if (mysqli_num_rows($resultado) == 0) {
            $insertQuery = "INSERT INTO productos (codigo_producto, nombre, precio_lista, id_usuario, id_administrador
                            VALUES ('$codigo', '$nombre', '$precio_lista', '$id_usuario', 1)";
            mysqli_query($conexion, $insertQuery);
        }
    }
    

    // Modificar producto
    function modificarDatos($conexion, $id_usuario, $codigo, $nombre, $precio) {
        $query = "UPDATE productos SET nombre = '$nombre', precio_lista = '$precio'
                  WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario'";
        mysqli_query($conexion, $query);
    }
    

    // Eliminar producto
    function eliminarDatos($conexion, $codigo, $id_usuario) {
        $query = "DELETE FROM productos WHERE codigo_producto = '$codigo' && id_usuario = '$id_usuario' ";
        mysqli_query($conexion, $query);
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------------//
    
    // Eliminar venta
    function eliminarVenta($conexion, $numero_venta, $codigo, $cantidad) {
        $query = mysqli_query($conexion, "SELECT cantidad FROM ventas1 WHERE numero_venta = '$numero_venta' 
        && codigo_producto = '$codigo' && id_administrador = 1");
        $consulta = mysqli_fetch_assoc($query)['cantidad'];
    
        if ($cantidad > 0) {
            if ($consulta > $cantidad) {
                // !!!!!!! id_administrador cambiar al crear nuevo administrador !!!!!!!
                $query = "UPDATE ventas1 SET cantidad = cantidad - $cantidad, total = total - precio_lista * $cantidad 
                WHERE numero_venta = '$numero_venta' && codigo_producto = '$codigo' && id_administrador = 1";
            } else {

                // !!!!!!! id_administrador cambiar al crear nuevo administrador !!!!!!!
                $query = "DELETE FROM ventas1 WHERE numero_venta = '$numero_venta' && codigo_producto = '$codigo' 
                && id_administrador = 1";
            }
        } 
        
        mysqli_query($conexion, $query);
    }
    

    // Mostrar ventas
    function mostrarVentas($conexion) {
        // !!!!!!! id_administrador cambiar al crear nuevo administrador !!!!!!!
        $query = "SELECT * FROM ventas1 where id_administrador = 1;" ;
        $resultadoVentas = mysqli_query($conexion, $query);
        return $resultadoVentas;
    }

?>
