<?php  
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "grupo7";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if (!$conn){
	die("falha na conexão: " . mysqli_connect_error());
}else{
	echo "conexão realizada com sucesso";
}


?>