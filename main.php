<?php
    session_start();
    if(!isset($_SESSION["sesion"]))
      header("Location: index.php");
    else if($_SESSION["id"]!=$_REQUEST["id"]){
      echo "Usted no tiene permisos para acceder al lugar solicitado";
      $var="";
      $cerrarsesion="";
    }else{
    require_once "conexion.php";
    $c=new conexion();
    $var=$c->getSecreto($_REQUEST["id"]);
    $cerrarsesion="<div><button class='btn btn-lg btn-danger'>Cerrar sesion</button></div>";
    }
?>
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
      <?= $cerrarsesion; ?>
      <div class="wrap">
        <input type="hidden" id="id" value="<?=$var['user_id']?>">
        <label for="secret">Tu secreto esta a salvo:</label>
        <textarea id="secretBox" name="secret"><?php
          echo $var["secreto"];
          ?></textarea>
        <input type="text" class="key" placeholder="La Llave">
        <button class="btn btn-lg btn-success">Desencriptar</button>
      </div>
    </div> 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
      $(".btn-success").click(function(e){
        var key=$(".key").val();
        var id=$("#id").val();
        $("#secretBox").load("functions.php?form=main&secret="+key+"&id="+id);
      });
      $(".btn-danger").click(function(e){
        $.get("functions.php?form=cerrar",function(){$(location).attr('href', 'main.php');});
      });
    </script>
  </body>
</html>