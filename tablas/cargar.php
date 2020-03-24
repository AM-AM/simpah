<?php
include ("../class/class-datos.php");	
include ("../class/class-conexion.php");


//nos permite recepcionar una variable que si exista y que no sea null
  //  require_once("conexion.php");
    //require_once("functions.php");

 $archivo = $_FILES["archivo"]["name"];
if (!empty($archivo)) {
    $conexion=new Conexion();
    //echo $archivo."esta en la ruta temporal: " .$archivo_copiado;
/*
    $lines = file($archivo);
    $utf8_lines = array_map('utf8_encode',$lines);

    $array = array_map('str_getcsv',$utf8_lines);

    echo $array;

    if (copy($archivo ,$archivo_guardado )) {
        echo "se copeo correctamente el archivo temporal a nuestra carpeta de trabajo <br/>";
    }else{
        echo "hubo un error <br/>";
    }*/
                                                                          
        @move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo);

        //Abrimos nuestro archivo
        $archivo = fopen($archivo, "r");                
        //Lo recorremos
        
        while ($data = fgetcsv ($archivo, 100000, ";")) {

            $num_campos = count($data)/14;
            for ($i = 0; $i < $num_campos; $i++) {
                 $idCiudad = Datos::idCiudad($data[0], $conexion);
                 
                 $idMercado = Datos::idMercado($data[1], $conexion);
                
                 $idTipoProducto = Datos::idTipoProducto($data[2], $conexion);
                
                 $idTamanio = Datos::idTamanio($data[9], $conexion);
                
                 $idProducto = Datos::idProducto(utf8_encode($data[7]),$idTamanio, $conexion);
                
                 $idOrigen = Datos::idOrigen(utf8_encode($data[8]), $conexion);
                
                 $idUnidadVenta = Datos::idUnidadVenta($data[10],$conexion);
                
                $idMoneda = Datos::idMoneda($data[11],$conexion);
                
                $objeto_Date = date_create_from_format('Y-m-d', $data[3]."-".$data[4]."-".$data[5]);
                $fecha = date_format($objeto_Date,"Y/m/d");
                   
                Datos::insertRangoPrecios($fecha,$data[12],$data[13],$idProducto, $idUnidadVenta,$idMoneda, $idMercado,  $idOrigen, $conexion );
            }
        }                                                                       
    

}else{
    echo '<script language="javascript"> var mensaje = confirm("No a seleccionada ningun archivo");
        
        
            if (mensaje) {
                window.location="../administrador.php";
            }
            else {
                window.location="../administrador.php";
            }
        
        </script>';
        
}

//Cerramos el archivo
    /*
    
    if (file_exists($archivo_guardado)) {
         
         $fp = fopen($archivo_guardado,"r");//abrir un archivo
         $rows = 0;
         while ($datos = fgetcsv($fp , 1000 , ";")) {
                $rows ++;
               // echo $datos[0] ." ".$datos[1] ." ".$datos[2]." ".$datos[3] ."<br/>";
            if ($rows > 1) {
                $resultado = insertar_datos($datos[0],$datos[1],$datos[2],$datos[3]);
            if($resultado){
                echo "se inserto los datos correctamnete<br/>";
            }else{
                echo "no se inserto <br/>";
            }
            }
         }

/*
//VAMO A PROBAAH

require '../class/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
require '../class/class-conexion.php';
$nombreArchivo='prueba.xlsx';
$objPHPExcel = PHPExcel_IOFactory::load($archivo);
$objPHPExcel->setActiveSheetIndex(0);
$rows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
$con=new Conexion();
$cont=0;
for($i=2;$i<$rows;$i++){
        $a=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $b=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $c=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $d=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $e=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $f=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
//echo $a, $b,$c,$d,$e,$f;
$sql="INSERT INTO PRUEBA(a,b,c,d,e,f) VALUES('$a','$b','$c','$d','$e','$f')";
if($result=$con->ejecutarConsulta($sql)){
    $cont=$cont+1;
};
}
$salida='Se agregaron '.$cont.' registros';
echo $salida;

*/
?>