<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');

    $tipo = $_GET['tipo'];
    $id = $_GET['id'];
if($tipo == "Aluno"){
    $sql ="select * from aluno where id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($id));
    $row = $stmt->fetch();
    
}else{
    $sql ="select * from professor where id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($id));
    $row = $stmt->fetch();
}
    $username = $row["nome"];
    $email = $row["email"];
    $telemovel = $row["telemovel"];
    $morada = $row["morada"];
    $perfil = $row["tipo"];
    if($tipo == 'Aluno')
    $turma = $row["id_turma"];

    
    if(isset($_POST['save'])){
        if($tipo == 'Aluno'){
        $email1 = $_POST['inputEmail'];
        $nome1 = $_POST['inputNome'];
        $telemovel1 = $_POST['inputTelemovel'];
        $morada1 = $_POST['inputMorada'];
        $turma = $_POST['inputTurma'];
        if (empty($turma)) { 
            $stmt = $dbh->prepare('update aluno set nome = ?, telemovel = ?, morada = ?,id_turma = null where id= ?');
            $stmt->execute(array($nome1, $telemovel1, $morada1, $id));
            header('location:editUser.php?id='. $id .  '&tipo=' . $tipo);

        }
            $stmt = $dbh->prepare('update aluno set nome = ?, telemovel = ?, morada = ?,id_turma = ? where id= ?');
            $stmt->execute(array($nome1, $telemovel1, $morada1, $turma, $id));
            header('location:editUser.php?id='. $id .  '&tipo=' . $tipo);
            
            }else{
                if($tipo == 'Professor'){
                    $email1 = $_POST['inputEmail'];
                    $nome1 = $_POST['inputNome'];
                    $telemovel1 = $_POST['inputTelemovel'];
                    $morada1 = $_POST['inputMorada'];
                    $stmt = $dbh->prepare('update professor set nome = ?, telemovel = ?, morada = ? where id= ?');
                    $stmt->execute(array($nome1, $telemovel1, $morada1, $id));
                    header('location:editUser.php?id='. $id .  '&tipo=' . $tipo);
                
                }else
                echo('Erro!');
                
    
            }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil</title>
    <link rel="stylesheet"  type="text/css" href="stylesheet.css">
</head>
<body>
        
    <div class="container-fluid">
        <h1 style="text-align: center; font-size: 80px">Perfil</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2"><img style="height: 170px;" src="images\default_user.jpg"><br><br>
                    <button type="submit" class="btn btn-primary" style="font-size:10px;">Alterar Fotografia</button>
                    <button type="submit" class="btn btn-primary" style="font-size:10px;">Alterar Password</button> <br><br>
                    <a type="submit" class="btn btn-primary" style="font-size:10px;" href="Horarios.pdf" download>Horario</a>
                </div>
            
        
        <div class="col-md-7">
            <?php  if($tipo == 'Aluno'){?>
            <form method="POST">
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label" style="font-size: 19px;"><b>Nome</b></label>
                    <div class="col-sm-10">
                        <input type="nome" class="form-control" name="inputNome" placeholder="Nome" value="<?php echo $username;?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="inputEmail" placeholder="Email" value="<?php echo $email;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputTelemovel" class="col-sm-2 col-form-label">Telemovel</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="inputTelemovel" placeholder="Telemovel" value="<?php echo $telemovel;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputMorada" class="col-sm-2 col-form-label">Morada</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputMorada" placeholder="Morada" value="<?php echo $morada;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputTurma" class="col-sm-2 col-form-label">Turma</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="inputTurma" placeholder="Turma" value="<?php echo $turma;?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputPerfil" class="col-sm-2 col-form-label">Perfil</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputPerfil" placeholder="Perfil" readonly value="<?php echo $perfil;?>">
                
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <br><button type="submit" name="save" class="btn btn-primary">Guardar</button>
                        
                    </div>
                </div>
            </form>
            <?php }else if($tipo == 'Professor'){ ?>
                <form method="POST">
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label" style="font-size: 19px;"><b>Nome</b></label>
                    <div class="col-sm-10">
                        <input type="nome" class="form-control" name="inputNome" placeholder="Nome" value="<?php echo $username;?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="inputEmail" placeholder="Email" value="<?php echo $email;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputTelemovel" class="col-sm-2 col-form-label">Telemovel</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="inputTelemovel" placeholder="Telemovel" value="<?php echo $telemovel;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputMorada" class="col-sm-2 col-form-label">Morada</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputMorada" placeholder="Morada" value="<?php echo $morada;?>">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label for="inputPerfil" class="col-sm-2 col-form-label">Perfil</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputPerfil" placeholder="Perfil" readonly value="<?php echo $perfil;?>">
                
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <br><button type="submit" name="save" class="btn btn-primary">Guardar</button>
                        
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div><br>
    <a class="btn btn-primary" href="painel_administracao.php">Voltar</a>


    
</body>
</html>