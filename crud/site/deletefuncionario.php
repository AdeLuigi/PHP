<?php
//including the database connection file
include("config.php");

//pegando o id passado por url
$id = $_GET['id'];

//deletando funcionario com id pego por url
$result = mysqli_query($mysqli, "DELETE FROM funcionario WHERE idfuncionario=$id");

//redirecionando para index
header("Location:index.php");
?>

