<?php
	session_start();
	include_once("config.php");
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$usuario = mysqli_escape_string($conn, $_POST['email']); //isso serve para o sql injection
		$senha = mysqli_escape_string($conn, $_POST['senha']);
		//$senha = md5($senha); CRIPTOGRAFIA CASO NECESSÁRIO

		$sql = "SELECT * FROM funcionario WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$resultado = mysqli_fetch_assoc($result);

	if (empty($resultado)) {
		$_SESSION['loginErro'] = "Usuário ou senha inválida";
		header("Location: index.php");
	}elseif (isset($resultado)) {
		$_SESSION['usuarioId']		 	 = $resultado['idfuncionario'];
		$_SESSION['usuarioNiveisAcesso'] = $resultado['cargo'];
		$_SESSION['usuarioNome'] 	 	 = $resultado['email'];
		$_SESSION['usuarioSenha']        = $resultado['senha'];

		if ($_SESSION['usuarioNiveisAcesso'] == "gerente") {
			header("Location: site/index.php");
		}
		if ($_SESSION['usuarioNiveisAcesso'] == "funcionario") {
			header("Location: site/index.php");
		}
		
			
	}else {
		$_SESSION['loginErro'] = "Usuário ou senha inválida";
		header("Location: index.php");
	}


	}else {
		$_SESSION['loginErro'] = "Usuário ou senha inválida";
		header("Location: index.php");
	}
?>