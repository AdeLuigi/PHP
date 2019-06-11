<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
	$contato = mysqli_real_escape_string($mysqli, $_POST['contato']);
		
	// checando entrada
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Nome está vazio.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>idade está vazio.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email está vazio.</font><br/>";
		}
		if(empty($endereco)) {
			echo "<font color='red'>Endereco está vazio.</font><br/>";
		}
		if(empty($contato)) {
			echo "<font color='red'>Contato está vazio.</font><br/>";
		}
		
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email,endereco,contato) VALUES('$name','$age','$email','$endereco','$contato')");
		
		//display success message
		echo "<font color='green'> successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
