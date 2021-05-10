<?php
  include_once('snippets/head.php');
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
<!-- 

    
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <b><p style="text-align: center;">Nome de Utilizador:</p></b>
        </div>
        <div class="col-md-1">
            <p style="text-align: center;" ><input type="text"> </p>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <b><p style="text-align: center;">Email:</p></b>
        </div>
        <div class="col-md-1">
            <p style="text-align: center;" ><input type="text"> </p>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <b><p style="text-align: center;">Password:</p></b>
        </div>
        <div class="col-md-1">
            <p style="text-align: center;" ><input type="password"> </p>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <b><p style="text-align: center;">Confirmar password:</p></b>
        </div>
        <div class="col-md-1">
            <p style="text-align: center;" ><input type="password"> </p>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <b><p style="text-align: center;">Codigo de validação:</p></b>
        </div>
        <div class="col-md-1">
            <p style="text-align: center;" ><input type="text"> </p>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <b><p style="text-align: center;">Perfil: </p></b>
        </div>
        <div class="col-md-1">
            <p style="text-align: center;">
                <select name="perfil" id="pref">
                    <option value="Aluno">Aluno</option>
                    <option value="Professor">Professor</option>
                </select>
            </p>
        </div>
        <div class="col-md-5"></div>
    </div>


        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-1">
                <b><p style="text-align: center;"> <a href="login.php"> Ja Registado? </a></p></b>
            </div>
            <div class="col-md-1">
                <p style="text-align: center;">
                    <button >Registar</button></p>
            </div>
            <div class="col-md-5"></div>
        </div>


 -->




        <div class="container-fluid">
        <h1 style="text-align: center; font-size: 80px">Registar</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <form>
                <div class="form-group row">
                    <label for="inputID" class="col-sm-3 col-form-label">Nome de Utilizador:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputID" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="inputPW" class="col-sm-3 col-form-label">Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPW" placeholder="Password">
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="inputPW" class="col-sm-3 col-form-label">Confirmar password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputCPW" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPW" class="col-sm-3 col-form-label">Codigo de validação:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputCvalid" placeholder="Codigo de validação">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPerfil" class="col-sm-3 col-form-label">Perfil:</label>
                    <div class="col-sm-9">
                    <select name="perf" id="perf"class="col-sm-9 form-control">
                        <option value="aluno" id="aluno">Aluno</option>
                        <option value="professor" id="professor">Professor</option>
                    </select>
                    </div>
                </div>

                 </form>  <!--botões deverãopassar para dentro do form--> 
                <div class="form-group row">
                    <div class="col-sm-4">
                    
                    <br><a class="btn btn-primary" href="login.php" >Ja registado?</div></a>
                        <!-- <br><a href="registar.php" class="btn btn-primary">Registar</a> -->
                    <div style="text-align: right;" class="col-sm-8">
                    <br><button type="submit" class="btn btn-primary" >Registar</button></div>
                    </div>
                    
        </div>
    </div>
</body>
</html>