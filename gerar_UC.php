<?php
include('snippets/startDB.php');

$uc = $_POST['UC'];
$horas = $_POST['horas'];

$stmt = $dbh->prepare('select * from uc where nome = ?');
	$stmt->execute(array($uc));
	$num = $stmt->rowCount();

if($num == 1){
    echo("UC ja existente!");
   
}else{
        $stmt = $dbh->prepare('insert into uc(id_uc, nome, horas) values (?, ?, ?)');
	$stmt->execute(array('null', $uc, $horas));

    header('Location: painel_administracao.php');
}
?>