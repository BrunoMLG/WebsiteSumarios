<?php
include('snippets/startDB.php');


$email = $_POST['email'];



$stmt = $dbh->prepare('select * from email_prof where email = ?');
	$stmt->execute(array($email));
	$num = $stmt->rowCount();

if($num == 1){
    echo("<script>alert('Email ja existente!'); window.location.href='painel_administracao.php';</script>");

    
 
    
    $stmt = $dbh->prepare('insert into email_prof(email) values (?)');
	$stmt->execute(array($email));
    echo("<script>alert('Email Adicionado!'); window.location.href='painel_administracao.php';</script>");

    
}
?>