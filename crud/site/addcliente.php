<?php  
include_once("conexao.php");



if((isset($_POST['Nome'])) && (isset($_POST['CPF'])) && (isset($_POST['ModeloCarro'])) && (isset($_POST['PlacaCarro'])) && (isset($_POST['Cor'])) && (isset($_POST['telefone'])) && (isset($_POST['email']))){
	$banco = new mysqli("localhost", "root", "", "grupo7");
		$nome = mysqli_escape_string($conn, $_POST['Nome']); //isso serve para o sql injection
		$cpf = mysqli_escape_string($conn, $_POST['CPF']); //isso serve para o sql injection
		$modelo = mysqli_escape_string($conn, $_POST['ModeloCarro']);
        $placa = mysqli_escape_string($conn, $_POST['PlacaCarro']);
        $cor = mysqli_escape_string($conn, $_POST['Cor']);
        $telefone = mysqli_escape_string($conn, $_POST['telefone']);
        $email = mysqli_escape_string($conn, $_POST['email']);
		//$senha = md5($senha); CRIPTOGRAFIA CASO NECESSÁRIO

		$sql = "INSERT INTO cliente (Nome, CPF, ModeloCarro, PlacaCarro, Cor, telefone, email)
		VALUES ('$nome', '$cpf','$modelo','$placa','$cor','$telefone','$email')";
		$banco->query($sql);
		$banco->close();

	

		header("Location: index.php");
		
		
}
?>