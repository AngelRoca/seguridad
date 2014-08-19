<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu Secreto</title>
    <!-- CSS de Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
      <h1>Tu Secreto...</h1>
      <div class="wrap">
        <label for="secret">Tu secreto esta a salvo:</label>
        <textarea name="secret">
        </textarea>
        <input type="text" name="key" placeholder="La Llave">
        <button class="btn btn-lg btn-success">Abrir</button>
      </div>
    </div> 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>