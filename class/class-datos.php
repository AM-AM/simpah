<?php


class Datos{

    public static function idCiudad($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_ciudad WHERE nombre_ciudad = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
               return $fila['id'];
                
            }else{
                $sql2 = "INSERT INTO tbl_ciudad VALUES(null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                return $conexion->insert_id;
                 
            }
    }

    public static function idMercado($nombre,$IdCiudad, $conexion){
        $sql1 = "SELECT id FROM tbl_mercado WHERE nombre_mercado = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                return $fila['id'];
            }else{
                $sql2 = "INSERT INTO tbl_mercado VALUES (null, '$nombre', $IdCiudad)";
                $resultado=$conexion->ejecutarConsulta($sql2);
                return $conexion->insert_id;
            }
        
    }
    
    public static function idTipoProducto($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_tipo_producto WHERE name_tipo_producto = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                 return $fila['id'];
            }else{
                $sql2 = "INSERT INTO tbl_tipo_producto VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                return $conexion->insert_id;
               

            }
        
    }
    
    public static function idMoneda($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_moneda WHERE nombre_moneda =  '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                return $fila['id'];
                 
            }else{
                
                $sql2 = "INSERT INTO tbl_moneda VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                return $conexion->insert_id;

            }
        
    }
    
    public static function idOrigen($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_origen WHERE nombre_origen = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                return $fila['id'];
                 
            }else{
                $sql2 = "INSERT INTO tbl_origen VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                return $conexion->insert_id;
               
            }
        
    }
    public static function idProducto($nombre, $tamanio, $conexion){
       global $Producto_id,$Tipo_producto_id, $Tamanio_id;
       
            $sql2 = "SELECT id FROM tbl_producto WHERE nombre_producto = '$nombre' LIMIT 1";
            $resultado=$conexion->ejecutarConsulta($sql2);
            $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                return $fila['id'];
                
            }else{
              $sql3 =  "INSERT INTO tbl_producto VALUES (null,'$nombre',$Tipo_producto_id,$Tamanio_id)";
              $resultado=$conexion->ejecutarConsulta($sql2);
             return $conexion->insert_id;
            
            }
        
    }
    
    public static function idTamanio($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_tamanio where nombre_tamanio = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                return $fila['id'];
            }else{
                $sql2 = "INSERT INTO tbl_tamanio VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                return $conexion->insert_id;
                 
            }
        
    }
    
    public static function idUnidadVenta($nombre, $conexion){
        $sql1 = "SELECT id FROM tbl_unidad_venta WHERE nombre_unidad = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                return $fila['id'];
            }else{
                
                $sql2 = "INSERT INTO tbl_unidad_venta VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                return $conexion->insert_id;
            }
        
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