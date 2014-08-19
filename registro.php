<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <!-- CSS de Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
      <h1>Registro...</h1>
      <div class="wrap">
        <form action="functions.php" method="post">
          <input type="hidden" value="registro" name="form">
          <input type="text" name="user" placeholder="Nombre de Usuario">
          <input type="password" name="pass" placeholder="Contraseña">
          <input type="text" name="secreto" placeholder="Tu Secreto">
          <input type="text" name="key" placeholder="Tu Llave">
          <input type="submit" class="btn btn-lg btn-info" value="Enviar">
        </form>
      </div>
    </div> 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>