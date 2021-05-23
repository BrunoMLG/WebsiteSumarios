<?php
	include('snippets/startDB.php');
	include('snippets/Session.php');
	
	$PicNum = $_GET["PicNum"]; 
	$id = $_SESSION['id'];
	$stmt = $dbh->prepare('SELECT imagem FROM aluno WHERE id= ?');
	$stmt->execute(array($PicNum));
	$row = $stmt->fetch();


	Header( 'Content-type: image/jpg');
	 echo $row['imagem'];
?>