<?php
  include_once('snippets/head.php');
  include_once('snippets/startDB.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registar</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="index.php"><img style="height: 40px; margin-left: 5%;" src="images/LogoPorto.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
            </ul>
        </div>
      </nav>

        <div class="container-fluid">
        <h1 style="text-align: center; font-size: 80px">Registar</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <form action="snippets/register.php" method="POST">
                <div class="form-group row">
                    <label for="nome" class="col-sm-3 col-form-label">Nome de Utilizador:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="passwordc" class="col-sm-3 col-form-label">Confirmar password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="passwordc" name="passwordc" placeholder="Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPerfil" class="col-sm-3 col-form-label">Perfil:</label>
                    <div class="col-sm-9">
                    <select name="perf" id="perf"class="col-sm-9 form-control">
                        <option value="Aluno" name="Aluno">Aluno</option>
                        <option value="Professor" name="Professor">Professor</option>
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                    <br><a class="btn btn-primary"  values="registar" href="login.php">Já Registado?</a></div>

                        <!-- <br><a href="registar.php" class="btn btn-primary">Registar</a> -->
                    <div style="text-align: right;" class="col-sm-8">
                        <br><button type="submit" class="btn btn-primary">Registar</button></div>
                </div>

                    
        </div>
    </div>
</body>
</html>