<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    
    
   
  

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

    <!-- Custom CSS -->
    <!-- <link href="assets/css/sb-admin-2.css" rel="stylesheet">-->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
        <meta name="description" content="">
        <title>Neurônios Tecnologia</title>

        <meta name="viewport" content="width=device-width">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/mobile.css" media="(max-width: 320px)">

</head>
<body>


<div class="container">
            <div id="login-box">
                <div class="logo">
                    <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img img-responsive img-circle center-block"/>
                    <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
                </div><!-- /.logo -->
                
                <div class="controls">
                    <form  method="POST" action="valida.php">
                         <p class="text-center text-danger">
                            <?php if(isset($_SESSION['loginErro'])){
                                echo $_SESSION['loginErro'];
                                unset($_SESSION['loginErro']);
                            }?>
                        </p>
                        <p class="text-center text-success">
                            <?php 
                            if(isset($_SESSION['logindeslogado'])){
                                echo $_SESSION['logindeslogado'];
                                unset($_SESSION['logindeslogado']);
                            }
                            ?>
                        </p>
                    <!--<input type="text" name="username" placeholder="Username" class="form-control" />-->
                    <input value="" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                    <input class="form-control" required placeholder="Senha" name="senha" type="password" value="">
                    <!--<input type="text" name="username" placeholder="Password" class="form-control" />-->
                    <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
                    </form>
                </div><!-- /.controls -->
            </div><!-- /#login-box -->
        </div><!-- /.container -->
        <div id="particles-js"></div>
        
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="login.js"></script>    

    
   

</body>

</html>




