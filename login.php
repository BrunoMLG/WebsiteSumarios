<?php
  include_once('snippets/head.php');
  include_once('snippets/register.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="JS/javasript.js" ></script> 
    <title>Login Alunos</title>
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
        <h1 style="text-align: center; font-size: 80px">Login</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <form>
                <div class="form-group row">
                    <label for="inputID" class="col-sm-3 col-form-label">Id de Login:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputID" placeholder="Id de Login:">
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="inputPW" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPW" placeholder="Password:">
                    </div>
                </div><br>

                <!-- <div class="form-group row">
                    <label for="inputPerfil" class="col-sm-3 col-form-label">Perfil:</label>
                    <div class="col-sm-9">
                    <select name="perf" id="perf"class="col-sm-9 form-control">
                        <option value="aluno" id="aluno">Aluno</option>
                        <option value="professor" id="professor">Professor</option>
                    </select>
                    </div>
                </div> -->
                <button type="submit" class="btn" name="login_user">Login</button>
                 </form>  <!--botões deverãopassar para dentro do form--> 
                <div class="form-group row">
                    <div class="col-sm-3">
                    <br><button type="submit" class="btn btn-primary"  onclick="registar()">Registar</button></div>

                        <!-- <br><a href="registar.php" class="btn btn-primary">Registar</a> -->
                    <div style="text-align: right;" class="col-sm-9">
                        <br><button type="submit" class="btn btn-primary"  onclick="login()">Login</button></div>
                    </div>
                    
        </div>
    </div>
</body>
</html>
