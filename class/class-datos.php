<?php


class Datos{
    
    public static function idCiudad($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_ciudad WHERE nombre_ciudad = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $fila = $conexion->obtenerFila($resultado);
         return $fila['id'];
    }

    public static function idMercado($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_mercado WHERE nombre_mercado = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $fila = $conexion->obtenerFila($resultado);
         return $fila['id'];
        
    }
    
    public static function idTipoProducto($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_tipo_producto WHERE name_tipo_producto = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $fila = $conexion->obtenerFila($resultado);
         return $fila['id'];
        
    }
    
    public static function idMoneda($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_moneda WHERE nombre_moneda =  '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $fila = $conexion->obtenerFila($resultado);
         return $fila['id'];
        
    }
    
    public static function idOrigen($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_origen WHERE nombre_origen = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $fila = $conexion->obtenerFila($resultado);
         return $fila['id'];
        
    }
    public static function idProducto($nombre, $tamanio, $conexion){
        $sql1 = "SELECT count(id) as num FROM tbl_producto WHERE nombre_producto = '$nombre'";
                
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $fila = $conexion->obtenerFila($resultado);
        
        if($fila['num'] < 2 && is_null($tamanio)){
            $sql2 = "SELECT id FROM tbl_producto WHERE nombre_producto = '$nombre' LIMIT 1";
            $resultado2=$conexion->ejecutarConsulta($sql2);
            $fila2 = $conexion->obtenerFila($resultado2);
             return $fila2['id'];
        }else{
            $sql3 = "SELECT id FROM tbl_producto WHERE nombre_producto = '$nombre' and tbl_tamanio_id = '$tamanio' is not null";
            $resultado3=$conexion->ejecutarConsulta($sql3);
            $fila3 = $conexion->obtenerFila($resultado3);
             return $fila3['id'];
        }
        
        
    }
    
    public static function idTamanio($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_tamanio where nombre_tamanio = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $fila = $conexion->obtenerFila($resultado);
         return $fila['id'];
        
    }
    
    public static function idUnidadVenta($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_unidad_venta WHERE nombre_unidad = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $fila = $conexion->obtenerFila($resultado);
         return $fila['id'];
        
    }

    public static function insertRangoPrecios($fecha, $precioBajo, $precioAlto, $idProducto, $idUnidadVenta, $idMoneda, $idMercado, $idOrigen,$conexion){
 
        $sql = "INSERT INTO tbl_rango_precios VALUES (null ,$fecha,$precioBajo,$precioAlto,$idProducto,$idUnidadVenta,$idMoneda,$idMercado,$idOrigen)";
             
        $resultado=$conexion->ejecutarConsulta($sql);
        if($resultado){
            echo '<script language="javascript"> var mensaje = confirm("Insertado Correctamente");
            
            
            if (mensaje) {
                window.location="../administrador.php";
            }
            else {
                window.location="../administrador.php";
            }
        
            </script>';

        }else{
            echo '<script language="javascript"> var mensaje = confirm("Error al insertar datos");
            
            
            if (mensaje) {
                window.location="../administrador.php";
            }
            else {
                window.location="../administrador.php";
            }
        
            </script>';

        }
    }
}

?>