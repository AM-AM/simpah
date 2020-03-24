<?php


class Datos{
    private $Ciudad_id;
    private $Mercado_id;
    private $Tipo_producto_id;
    private $Moneda_id;
    private $Origen_id;
    private $Producto_id;
    private $Tamanio_id;
    private $Unidad_venta_id;

    public static function idCiudad($nombre, $conexion){
        global $Ciudad_id;
        $sql1 = "SELECT id FROM tbl_ciudad WHERE nombre_ciudad = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                $Ciudad_id = $fila['id'];
                return $Ciudad_id;
            }else{
                $sql2 = "INSERT INTO tbl_ciudad VALUES(null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                $Ciudad_id = $conexion->insert_id;
                return $Ciudad_id;
            }
    }

    public static function idMercado($nombre, $conexion){
        global $Mercado_id, $Ciudad_id;
        $sql1 = "SELECT id FROM tbl_mercado WHERE nombre_mercado = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                $Mercado_id = $fila['id'];
                return $Mercado_id;
            }else{
                $sql2 = "INSERT INTO tbl_mercado VALUES (null, '$nombre', $Ciudad_id)";
                $resultado=$conexion->ejecutarConsulta($sql2);
                $Mercado_id = $conexion->insert_id;
                return $Mercado_id;
            }
        
    }
    
    public static function idTipoProducto($nombre, $conexion){
        global $Tipo_producto_id;
        $sql1 = "SELECT id FROM tbl_tipo_producto WHERE name_tipo_producto = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                 $Tipo_producto_id = $fila['id'];
                 return $Tipo_producto_id;
            }else{
                $sql2 = "INSERT INTO tbl_tipo_producto VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                $Tipo_producto_id = $conexion->insert_id;
                return $Tipo_producto_id;

            }
        
    }
    
    public static function idMoneda($nombre, $conexion){
        global $Moneda_id;
        $sql1 = "SELECT id FROM tbl_moneda WHERE nombre_moneda =  '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                 $Moneda_id = $fila['id'];
                 return $Moneda_id;
            }else{
                
                $sql2 = "INSERT INTO tbl_moneda VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                $Moneda_id = $conexion->insert_id;
                return $Moneda_id;

            }
        
    }
    
    public static function idOrigen($nombre, $conexion){
        global $Origen_id;
        $sql1 = "SELECT id FROM tbl_origen WHERE nombre_origen = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                 $Origen_id = $fila['id'];
                 return $Origen_id;
            }else{
                
                $sql2 = "INSERT INTO tbl_origen VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                $Origen_id = $conexion->insert_id;
                return $Origen_id;
            }
        
    }
    public static function idProducto($nombre, $tamanio, $conexion){
       global $Producto_id,$Tipo_producto_id, $Tamanio_id;
       
            $sql2 = "SELECT id FROM tbl_producto WHERE nombre_producto = '$nombre' LIMIT 1";
            $resultado=$conexion->ejecutarConsulta($sql2);
            $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                $Producto_id = $fila['id'];
                return $Producto_id;
            }else{
              $sql3 =  "INSERT INTO tbl_producto VALUES (null,'$nombre',$Tipo_producto_id,$Tamanio_id)";
              $resultado=$conexion->ejecutarConsulta($sql2);
              $Producto_id = $conexion->insert_id;
              return $Producto_id;
            }
        
    }
    
    public static function idTamanio($nombre, $conexion){
        global $Tamanio_id;
        $sql1 = "SELECT id FROM tbl_tamanio where nombre_tamanio = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                $Tamanio_id = $fila['id'];
                return $Tamanio_id;
            }else{
                $sql2 = "INSERT INTO tbl_tamanio VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                $Tamanio_id = $conexion->insert_id;
                return $Tamanio_id;
            }
        
    }
    
    public static function idUnidadVenta($nombre, $conexion){
        global $Unidad_venta_id;
        $sql1 = "SELECT id FROM tbl_unidad_venta WHERE nombre_unidad = '$nombre'";
			
        #resultado de la consulta				
        $resultado=$conexion->ejecutarConsulta($sql1);
        $cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
                $fila = $conexion->obtenerFila($resultado);
                $Unidad_venta_id = $fila['id'];
                return $Unidad_venta_id;
            }else{
                
                $sql2 = "INSERT INTO tbl_unidad_venta VALUES (null, '$nombre')";
                $resultado=$conexion->ejecutarConsulta($sql2);
                $Unidad_venta_id = $conexion->insert_id;
                return $Unidad_venta_id;
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