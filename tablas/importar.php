<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    
    
    <div class="row" style="padding:0em 10em 0em">
          
        <div class="col-lg-11" >
            <div class="p-5">
                 <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Importar archivo de excel</h6>
                </div>
              <div id="areaSubirFormato">
                        <form action="database/subirFormatoProveedores.php" method="post" enctype="multipart/form-data">
                            <p>
                                <input type="submit" name="submit" value="Subir" accept=".xls,.xlsx" />
                                <input type="file" name="file" />
                            </p>
                        </form>
            </div>
          
        </div>
            <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>