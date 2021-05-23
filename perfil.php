<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');
  include_once('snippets/Session.php');
if($_SESSION["tipo"] == "Aluno"){
    $sql ="select * from aluno where id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_SESSION["id"]));
    $row = $stmt->fetch();
    
}else{
    $sql ="select * from professor where id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_SESSION["id"]));
    $row = $stmt->fetch();
}
$username = $row["nome"];
    $email = $row["email"];
    $telemovel = $row["telemovel"];
    $morada = $row["morada"];
    $perfil = $row["tipo"];
    $image = $row['imagem'];
    if($image == '') {$image = 'default.jpg';}


    if (isset($_POST['upload'])) {
 
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];   
            $folder = "perfil/pefil".$_SESSION['id'] . '.jpg';

            if($_SESSION['tipo']== 'Aluno'){
                $stmt = $dbh->prepare('UPDATE aluno SET imagem = ? WHERE id = ?');  
                $stmt->execute(array($filename, $_SESSION["id"]));
            
                }else if($_SESSION['tipo']== 'Professor'){
                    $stmt = $dbh->prepare('UPDATE professor SET imagem = ? WHERE id = ?') ;
                    $stmt->execute(array($filename, $_SESSION["id"])) ;
                }

            
            // Move a imagem para o diretório image
            if (move_uploaded_file($tempname, $folder))  {
                $msg = "Image uploaded successfully";
                header("location:perfil_aluno.php");
            }else{
                $msg = "Failed to upload image";
          }
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
    </
    <div class="container-fluid">
        <h1 style="text-align: center; font-size: 80px">Perfil</h1>
    </div>
    <br>
    <div class="row">
    
        <div class="col-md-2"><img style="height: 170px;" src='<?php echo 'perfil/'.$image; ?>'><br><br>
        <form action="" method="POST" enctype="multipart/form-data">
                    <span class="btn btn-primary btn-file" style="font-size:10px;">
                        <label for="uploadfile"> Fotografia </label> 
                        <input type="file" name="uploadfile" value="" />
                        
                        
                    </span>
                    <input type="submit" class="btn btn-primary" name="upload" style="font-size:10px" value="Enviar"/>
                </form>
                    <a href="newpw.php" class="btn btn-primary" style="font-size:10px;">Alterar Password</a> <br><br>
                    <button type="submit" class="btn btn-primary" style="font-size:10px;">Horario</button>
                </div>
            
        
        <div class="col-md-7">

            <form action="updateDB.php" method="POST">
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
                        <br><button type="submit" class="btn btn-primary">Guardar</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>


    
</body>
</html>