<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$cargo = mysqli_real_escape_string($mysqli, $_POST['cargo']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
	
	// checando entrada
	if(empty($nome) || empty($cargo) || empty($email)) {	
			
		if(empty($nome)) {
			echo "<font color='red'>Nome está vazio</font><br/>";
		}
		
		if(empty($cargo)) {
			echo "<font color='red'>O campo cpf está vazio</font><br/>";
		}
		if(empty($modelo)) {
			echo "<font color='red'>O campo cpf está vazio</font><br/>";
		}
        if(empty($email)) {
			echo "<font color='red'>O campo email está vazio.</font><br/>";
		}
	} else {	
		//jogando dados para tabela
		$result = mysqli_query($mysqli, "UPDATE funcionario SET nome='$nome',cargo='$cargo',email='$email' WHERE idfuncionario=$id");
		
		//dando reload na pagina
		header("Location: index.php");
	}
}
?>
<?php
//pegando id por url
$id = $_GET['id'];

//checando id na tabela para editar
$result = mysqli_query($mysqli, "SELECT * FROM funcionario WHERE idfuncionario=$id");

while($res = mysqli_fetch_array($result))
{
	$nome = $res['nome'];
	$cargo = $res['cargo'];
	$email = $res['email'];
   
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editfuncionario.php">
		<table border="0">
			<tr> 
				<td>Nome</td>
				<td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
			</tr>
			<tr> 
				<td>CPF</td>
				<td><input type="text" name="cargo" value="<?php echo $cargo;?>"></td>
			</tr>
			<tr> 
				<td>Modelo do carro</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
