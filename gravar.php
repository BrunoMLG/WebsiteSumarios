<?php

$imagem = $_FILES["imagem"];
include('snippets/startDB.php');
include('snippets/Session.php');

if($imagem != NULL) {
	$nomeFinal ='perfil/perfil' .$_SESSION['id'].'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal);

		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

		if($_SESSION['tipo']== 'Aluno'){
			$stmt = $dbh->prepare('UPDATE aluno SET imagem = ? WHERE id = ?');
			
			$stmt->execute(array($mysqlImg, $_SESSION["id"]));
			
		}else if($_SESSION['tipo']== 'Professor'){
			$stmt = $dbh->prepare('UPDATE professor SET imagem = ? WHERE id = ?') ;
			
			$stmt->execute(array($mysqlImg, $_SESSION["id"])) ;

		}
		
		 header("location:perfil_aluno.php");
	}
}
else {
	echo"Erro!";
}

?>