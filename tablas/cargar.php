<?php
include ("../class/class-datos.php");	
include ("../class/class-conexion.php");

 $archivo = $_FILES["archivo"]["name"];
if (!empty($archivo)) {
    $conexion=new Conexion();
                                                                          
        @move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo);

        //Abrimos nuestro archivo
        $archivo = fopen($archivo, "r");                
        //Lo recorremos
        
        while ($data = fgetcsv ($archivo, 100000, ";")) {

            $num_campos = count($data)/14;
            for ($i = 0; $i < $num_campos; $i++) {
                $idCiudad = Datos::idCiudad(utf8_encode($data[0]), $conexion);
                $idMercado = Datos::idMercado(utf8_encode($data[1]),$idCiudad, $conexion);
                $idTipoProducto = Datos::idTipoProducto(utf8_encode($data[2]), $conexion);
                $idTamanio = Datos::idTamanio(utf8_encode($data[9]), $conexion);
                $idProducto = Datos::idProducto(utf8_encode($data[7]),$idTamanio, $conexion);
                $idOrigen = Datos::idOrigen(utf8_encode($data[8]), $conexion);
                $idUnidadVenta = Datos::idUnidadVenta(utf8_encode($data[10]),$conexion);
                $idMoneda = Datos::idMoneda(utf8_encode($data[11]),$conexion);
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