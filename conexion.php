<?php
class conexion{

	public function conectar(){
		$con=mysqli_connect("localhost","root","spaceship","seguridad");
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  return false;
		}
	return $con;
	}

	public function login($user,$pass){
		try{
		$con=$this->conectar();
		$hash=md5($pass);
		$query="select * from usuarios where user='".$user."' and pass='".$hash."'";
		$result=mysqli_query($con,$query);
		return mysqli_fetch_array($result);
		}catch(Exception $e){echo $e;return false;}
	}

	public function newUser($user,$pass){
		try{
		$con=$this->conectar();
		$hash=md5($pass);
		$query="INSERT INTO usuarios (user,pass,permisos) VALUES ('".$user."','".$hash."',1)";
		$result=mysqli_query($con,$query);
		mysqli_close($con);
		}catch(Exception $e){echo $e;return false;}
		return $result;
	}

	public function newSecreto($secreto,$llave,$user){
		try{
		$con=$this->conectar();
		$encript=$this->encriptar($secreto,$llave);
		$query="INSERT INTO secretos (secreto,user_id) VALUES ('".$encript."',".$user["id"].")";
		$result=mysqli_query($con,$query);
		mysqli_close($con);
		}catch(Exception $e){echo $e;return false;}
		return $result;
	}

	public function getSecreto($id){
		try{
			$con=$this->conectar();
			$query="SELECT * FROM secretos WHERE user_id=".$id;
			$result=mysqli_query($con,$query);
			return mysqli_fetch_array($result);
		}catch(Exception $e){echo $e;return false;}
	}

	  // Funcion de encriptacion simetrica
  private function encriptar($secreto,$llave){
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
  public function desencriptar($secreto,$llave){
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

}

?>