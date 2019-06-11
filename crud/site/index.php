<?php
session_start();
//including the database connection file
include_once("config.php");
$ade = null;
if($_SESSION['usuarioNiveisAcesso'] == "funcionario"){
$ade = "disabled";
}
if($_SESSION['usuarioNiveisAcesso'] == "gerente" || $_SESSION['usuarioNiveisAcesso'] == "funcionario" ){
}
else {
$_SESSION['loginErro'] = "Usuário ou senha inválida";
header("Location: ../index.php");
}
?>
<html>
  <head>	
    <title>Homepage
    </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div class="container-fluid">
      <!-- As a link -->
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand branco" href="sair.php">Sair
        </a>
      </nav>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h2>Clientes
          </h2>
        </div>
        <div class="col-sm-6 text-right h2">
          <button class="btn btn-primary" 
                  <?php echo $ade ?> data-toggle="modal" data-target="#exampleModal2">
          <i class="fa fa-plus">
          </i> Ver funcionario
          </button>
        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus">
          </i> Novo Cliente
        </a>
        <a class="btn btn-default" href="index.php">
          <i class="fa fa-refresh">
          </i> Atualizar
        </a>
      </div>
    </div>
    </div>
  <?php
//including the database connection file
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM cliente ORDER BY idcliente DESC");
?>
  <hr>
  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nome
          </th>
          <th >CPF
          </th>
          <th>ModeloCarro
          </th>
          <th>Placa do Carro
          </th>
          <th>Cor
          </th>
          <th>telefone
          </th>
          <th>email
          </th>
          <th>MODIFICAR
          </th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="filter:pesquisaMorador">
          <?php 
while($res = mysqli_fetch_array($result)) { 		
echo "<tr>";
echo "<td>".$res['Nome']."</td>";
echo "<td>".$res['CPF']."</td>";
echo "<td>".$res['ModeloCarro']."</td>";	
echo "<td>".$res['PlacaCarro']."</td>";
echo "<td>".$res['Cor']."</td>";
echo "<td>".$res['telefone']."</td>";
echo "<td>".$res['email']."</td>";
echo "<td><a href=\"edit.php?id=$res[idcliente]\" class=\"btn btn-sm btn-warning\">Edit</a> | <a href=\"delete.php?id=$res[idcliente]\" class=\"btn btn-sm btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
}
?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Abrir chamado
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
        </div>
        <div class="modal-body">
          <form action="addcliente.php" method="post">
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Nome
              </label>  
              <div class="col-md-12">
                <input id="textinput" name="Nome" type="text" placeholder="" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">CPF
              </label>  
              <div class="col-md-12">
                <input id="textinput" name="CPF" type="text" placeholder="" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Modelo do Carro
              </label>  
              <div class="col-md-12">
                <input id="textinput" name="ModeloCarro" type="text" placeholder="" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Placa do Carro
              </label>  
              <div class="col-md-12">
                <input id="textinput" name="PlacaCarro" type="text" placeholder="" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Cor
              </label>  
              <div class="col-md-12">
                <input id="textinput" name="Cor" type="text" placeholder="" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Telefone
              </label>  
              <div class="col-md-12">
                <input id="textinput" name="telefone" type="text" placeholder="" class="form-control input-md" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Email
              </label>  
              <div class="col-md-12">
                <input id="textinput" name="email" type="text" placeholder="" class="form-control input-md" required="">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
              </button>
              <button type="submit" class="btn btn-primary" type="submit">Save changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
//including the database connection file
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM funcionario ORDER BY idfuncionario DESC");
?>
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nome
              </th>
              <th >Email
              </th>
              <th>Cargo
              </th>
              <th>MODIFICAR
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="filter:pesquisaMorador">
              <?php 
while($res = mysqli_fetch_array($result)) { 		
echo "<tr>";
echo "<td>".$res['nome']."</td>";
echo "<td>".$res['email']."</td>";
echo "<td>".$res['cargo']."</td>";	
echo "<td><a href=\"editfuncionario.php?id=$res[idfuncionario]\" class=\"btn btn-sm btn-warning\">Edit</a> | <a href=\"deletefuncionario.php?id=$res[idfuncionario]\" class=\"btn btn-sm btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
}
?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </body>
</html>
