<?php  
//segundo arquivo de conexao
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

if((isset($_POST['remail'])) && (isset($_POST['rsenha']))){
	$banco = new mysqli("localhost", "root", "", "test");
		$nome = mysqli_escape_string($conn, $_POST['nome']); //isso serve para o sql injection
		$usuario = mysqli_escape_string($conn, $_POST['remail']); //isso serve para o sql injection
		$senha = mysqli_escape_string($conn, $_POST['rsenha']);
		//$senha = md5($senha); CRIPTOGRAFIA CASO NECESSÁRIO

		$sql = "INSERT INTO usuario (senha, email, nome)
		VALUES ('$senha', '$usuario','$nome')";
		$banco->query($sql);
		$banco->close();

	

		header("Location: index.php");
		
		
			
	
}
?>