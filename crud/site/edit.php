<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nome = mysqli_real_escape_string($mysqli, $_POST['Nome']);
	$cpf = mysqli_real_escape_string($mysqli, $_POST['CPF']);
	$modelo = mysqli_real_escape_string($mysqli, $_POST['ModeloCarro']);
    $placa = mysqli_real_escape_string($mysqli, $_POST['PlacaCarro']);
    $cor = mysqli_real_escape_string($mysqli, $_POST['Cor']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
	
	// checando entrada
	if(empty($nome) || empty($cpf) || empty($placa) || empty($cor) || empty($telefone) || empty($email)) {	
			
		if(empty($nome)) {
			echo "<font color='red'>Nome está vazio</font><br/>";
		}
		
		if(empty($cpf)) {
			echo "<font color='red'>O campo cpf está vazio</font><br/>";
		}
		if(empty($modelo)) {
			echo "<font color='red'>O campo cpf está vazio</font><br/>";
		}
			
        if(empty($placa)) {
			echo "<font color='red'>O campo placa está vazio.</font><br/>";
		}
        if(empty($cor)) {
			echo "<font color='red'>O campo cor está vazio.</font><br/>";
		}
        if(empty($telefone)) {
			echo "<font color='red'>O campo telefone está vazio.</font><br/>";
		}
        if(empty($email)) {
			echo "<font color='red'>O campo email está vazio.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE cliente SET Nome='$nome',CPF='$cpf',ModeloCarro='$modelo',PlacaCarro='$placa',Cor='$cor',telefone='$telefone',email='$email' WHERE idcliente=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//pegando o id pela url
$id = $_GET['id'];

//checando id na tabela para editar
$result = mysqli_query($mysqli, "SELECT * FROM cliente WHERE idcliente=$id");

while($res = mysqli_fetch_array($result))
{
	$nome = $res['Nome'];
	$cpf = $res['CPF'];
	$modelo = $res['ModeloCarro'];
    $placa = $res['PlacaCarro'];
    $cor = $res['Cor'];
    $telefone = $res['telefone'];
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
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nome</td>
				<td><input type="text" name="Nome" value="<?php echo $nome;?>"></td>
			</tr>
			<tr> 
				<td>CPF</td>
				<td><input type="text" name="CPF" value="<?php echo $cpf;?>"></td>
			</tr>
			<tr> 
				<td>Modelo do carro</td>
				<td><input type="text" name="ModeloCarro" value="<?php echo $modelo;?>"></td>
			</tr>
            <tr> 
				<td>Placa</td>
				<td><input type="text" name="PlacaCarro" value="<?php echo $placa;?>"></td>
			</tr>
            <tr> 
				<td>Cor</td>
				<td><input type="text" name="Cor" value="<?php echo $cor;?>"></td>
			</tr>
            <tr> 
				<td>Telefone</td>
				<td><input type="text" name="telefone" value="<?php echo $telefone;?>"></td>
			</tr>
            <tr> 
				<td>Email</td>
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
