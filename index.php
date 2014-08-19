<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesion</title>
    <!-- CSS de Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
      <h1>Bienvenido...</h1>
      <div class="box">
        <form action="functions.php" method="post">
          <input type="hidden" value="login" name="form">
          <input type="text" name="user" placeholder="Usuario">
          <input type="password" name="pass" placeholder="Contraseña">
          <input type="submit" class="btn btn-lg btn-primary" value="Entrar">
        </form>
        <a href="registro.php">Registrate...</a>
      </div>
    </div> 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>