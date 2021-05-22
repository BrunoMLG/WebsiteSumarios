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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil</title>
    <link rel="stylesheet"  type="text/css" href="stylesheet.css">
</head>
<body>
    <?php
  include_once('snippets/menu_aluno.php');
?>


    
</body>
</html>