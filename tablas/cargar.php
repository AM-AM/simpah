<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

        $nombre_archivo = $_FILES['excel']['name'];
        if (move_uploaded_file($_FILES['excel']['tmp_name'],  $nombre_archivo)){
            echo "El archivo ha sido cargado correctamente.";
         }
         else{
            echo "Ni papass";
         }
    
    
    
    ?>
</body>
</html>