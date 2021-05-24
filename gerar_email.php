<?php
include('snippets/startDB.php');



$email = $_POST['email'];



$stmt = $dbh->prepare('select * from email_aluno where email = ?');
	$stmt->execute(array($email));
	$num = $stmt->rowCount();

if($num == 1){
    echo("<script>alert('Email ja existente!'); window.location.href='painel_administracao.php';</script>");

}else{
    

    $stmt = $dbh->prepare('insert into email_aluno(email) values (?)');
	$stmt->execute(array($email));
    echo("<script>alert('Email Adicionado!'); window.location.href='painel_administracao.php';</script>");

}
?>