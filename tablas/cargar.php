<?php

//nos permite recepcionar una variable que si exista y que no sea null
  //  require_once("conexion.php");
    //require_once("functions.php");

    $archivo = $_FILES["archivo"]["name"];

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

     $linea = 0;
//Abrimos nuestro archivo
    $archivo = fopen($archivo, "r");
    
    //Lo recorremos
    while ($data = fgetcsv ($archivo, 1000, ";")) {

        $num_campos = count($data);

        for ($i = 0; $i < $num_campos; $i++) {
           echo $data[$i];
           echo "\n";
        }

      break;
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

*/



?>