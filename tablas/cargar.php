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

        if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {

        
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));


            $newFileName = md5(time().$fileName).'.'.$fileExtension;

            
            if(move_uploaded_file($fileTmpPath, $newFileName))
            {
              $message ='File is successfully uploaded.';
            }
            else
            {
              $message = 'Error';
            }

           echo $message;

        }
    
    
    ?>
</body>
</html>