
<html>
  <head>
    <title>Simpah-Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/log.css">
  </head>
  <body style="background-image:url(images/simpah_back.jpg); background-size:cover; background-attachment: fixed;">
    <br>

    <h1>SIMPAH Login</h1>

  <div class="login-page" >
    <div class="form" style="background-color:#6495ED;" >
      <div class="login-form">
        <input type="text" class="form-control" placeholder="Usuario" id="txt-Usuario"/>
        <input type="password" class="form-control" placeholder="Contraseña" id="txt-Password"/>
        <button class="btn btn-primary" id="btn-iniciar-sesion" onclick="iniciarSesion();">Iniciar Sesion</button>
        <div id="status"></div>
        <br><br>
        <a href="" style="color: #F0F8FF;">Olvidé mi contraseña</a> <br>
        <a href="index.html" style="color: #F0F8FF;">Pagina Principal</a>
        <br>
       
    </div>
  </div>

  </body>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/sesion.js"></script>
</html>