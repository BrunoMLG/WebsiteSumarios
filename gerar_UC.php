<?php
include('snippets/startDB.php');

$uc = $_POST['UC'];
$horas = $_POST['horas'];
$prof = $_POST['listProfs'];

$stmt = $dbh->prepare('select * from uc where nome = ?');
	$stmt->execute(array($uc));
	$num = $stmt->rowCount();

if($num == 1){
    echo("UC ja existente!");
   
}else{
        $stmt = $dbh->prepare('insert into uc(id_uc, nome, horas) values (?, ?, ?)');
	    $stmt->execute(array('null', $uc, $horas));

        $stmt = $dbh->prepare('select id_uc from uc where nome = ?');
	    $stmt->execute(array($uc));
	    $uc_id = $stmt->fetch();

        $stmt = $dbh->prepare('insert into leciona(id_uc, id_prof) values (?, ?)');
        $stmt->execute(array($uc_id['id_uc'], $prof));
        header('Location: painel_administracao.php');
}
?>