<?php 



  // Funcion de encriptacion simetrica
  function encriptar($secreto,$llave){
    $hash=sha1($llave);
    $final="";

    for($i=0;$i<strlen($secreto);$i++){
      $a=$secreto[$i];
      $b=$hash[$i];
      $num1=ord($a);
      $num2=ord($b);
      $sum=$num1+$num2;
      $sum*=$num2;
      $final.=$sum." ";
    }
  return $final;
  }

  // Funcion de desencriptacion simetrica
  function desencriptar($secreto,$llave){
    $hash=sha1($llave);
    $final="";
    $array=split(" ", $secreto);
    
    for($i=0;$i<count($array);$i++){
      $aux1=ord($hash[$i]);
      $r=(int)$array[$i];
      $aux2=($r/$aux1)-$aux1;
      $final.=chr($aux2);
    }
    return $final;
  }
?>