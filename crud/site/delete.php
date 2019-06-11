<?php
//including the database connection file
include("config.php");

//pegando id pela url
$id = $_GET['id'];

//deletando cliente com aquele id
$result = mysqli_query($mysqli, "DELETE FROM cliente WHERE idCliente=$id");

//redirecionando para index
header("Location:index.php");
?>

