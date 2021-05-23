<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');
  include_once('snippets/Session.php');

  $id = $_SESSION['id'];
  $tipo = $_SESSION['tipo'];

 
  if(isset($_POST['alt'])){
    $password = $_POST['password'] ;
    $passwordc = $_POST['passwordc'] ;
    if($password == $passwordc){
        if($tipo == 'Aluno'){
            $password = md5($password);
            $stmt = $dbh->prepare('UPDATE aluno set password = ? where id= ?');
			$stmt->execute(array($password, $id));
        }else if($tipo == 'Professor'){
            $password = md5($password);
            $stmt = $dbh->prepare('UPDATE professor set password = ? where id= ?');
			$stmt->execute(array($password, $id));
        }
    }else if ($password != $passwordc){echo '<script>alert("Erro! Passwords não Coincidem!")</script>';}

  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil</title>
    <?php include("snippets/head.php") ?>
</head>
<body>
    <?php
  include_once('snippets/menu.php');
?>
<br>
<div class="col-md-6 offset-md-3">
<form action="" method="post">
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
    <div style="text-align: right;" class="col-sm-8">
        <br><button type="submit" name="alt" class="btn btn-primary">Alterar Password</button>
    </div>

</div>

</form>
</body>
</body>
</html>