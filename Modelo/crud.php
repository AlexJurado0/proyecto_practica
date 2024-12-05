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
        
        $query = "insert into productos (codigo_producto, id_usuario, nombre, precio_lista) values ('$codigo', '$id_usuario', '$nombre', '$precio_lista')";
        $result = mysqli_query($conexion, $query);
    }

    //modificar producto
    function modificarDatos($conexion, $codigo, $nombre, $precio){
        $query = "update productos SET nombre = '$nombre', precio_lista = '$precio' WHERE codigo_producto = '$codigo'";
        mysqli_query($conexion,$query);
           
    }

    //eliminar producto
    function eliminarDatos ($conexion, $codigo){
        $query = "delete from productos where codigo_producto = $codigo ";
        mysqli_query($conexion, $query);
    }
   

    //-------------------------------------------------------------------------------------------------------------------------------------------------------------//


    //eliminar venta
    function eliminarVenta($conexion, $codigo, $cantidad) {
        
        $resultado = mysqli_query($conexion, "SELECT cantidad FROM ventas1 WHERE id_ventas = '$codigo'");
        $consulta = mysqli_fetch_assoc($resultado)['cantidad'];

        if ($cantidad > 0) {
            if ($consulta > $cantidad) {
                $query = "UPDATE ventas1 SET cantidad = cantidad - $cantidad , total = total - precio_lista * $cantidad WHERE id_ventas = '$codigo'";
            }else {
                $query = "delete from ventas1 where id_ventas = $codigo ";
            }
        }else {
            header("Location: ../Vista/ventas.php");
        }
        
        $result = mysqli_query($conexion, $query);
        
    }

    
    

    //guardar venta
    function guardarVenta($conexion, $codigo, $producto, $precio, $id_usuario){
        $query = "SELECT * FROM ventas1 WHERE codigo_producto = '$codigo'";
        $resultadoVerificacion = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultadoVerificacion) > 0) {
            $query = "update ventas1 SET cantidad = cantidad + 1, total = total + precio_lista where codigo_producto = '$codigo'";
        } else {
            $cantidad = 1;
            $total = $precio * $cantidad;
            $query = "insert into ventas1 (producto, cantidad,total, precio_lista, codigo_producto, id_usuario) 
            VALUES ('$producto','$cantidad ', '$precio','$total', '$codigo', '$id_usuario')";
        }
        
        mysqli_query($conexion, $query);
    }

    //mostrar ventas
    function mostrarVentas($conexion, $id_usuario) {
        $query = "SELECT * FROM ventas1 v inner join login l on v.id_usuario = l.id_usuario where v.id_usuario = '$id_usuario'; " ;
        $resultadoVentas = mysqli_query($conexion, $query);
        return $resultadoVentas;
    }

    
?>