<?php 
session_start();
ini_set('display_errors', '1');
require_once "conexion.php";
  $c=new conexion();

  switch ($_REQUEST["form"]) {
    case 'login':
    $var=$c->login($_REQUEST["user"],$_REQUEST["pass"]);
    if($var!=null){
      $_SESSION["sesion"]=$var["pass"];
      $_SESSION["id"]=$var["id"];
      header("Location: main.php?id=".$var["id"]);
    }
    else
      header("Location: index.php");
    break;
    case 'registro':
    $c->newUser($_REQUEST["user"],$_REQUEST["pass"]);
    $var=$c->newSecreto($_REQUEST["secreto"],$_REQUEST["key"],$c->login($_REQUEST["user"],$_REQUEST["pass"]));
    if($var!=null)
      header("Location: index.php");
    else
      header("Location: registro.php");
    break;
    case 'main':
    $secret=$c->getSecreto($_REQUEST["id"]);
    echo $c->desencriptar($secret["secreto"],$_REQUEST["secret"]);
    break;
    case 'cerrar':
    session_destroy();
    break;

    default:
      header("Location: index.php");
      break;
  }

  function vardumping($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
  }
?>