<?php
  include('snippets/startDB.php');


$email = $_POST['email'];
$nome = $_POST['nome'];
$password = $_POST['password'];
$passwordc = $_POST['passwordc'];
$perfil = $_POST['perf'];

	if($password == $passwordc){
		$password = md5($password);
		if($perfil == 'Aluno'){
			$stmt = $dbh->prepare('select * from email_aluno where email = ?');
			$stmt->execute(array($email));
			$num = $stmt->rowCount();

			$stmt = $dbh->prepare('select * from aluno where email = ?');
			$stmt->execute(array($email));
			$num1 = $stmt->rowCount();



			if($num == 1 and $num1 == 0){

				$stmt = $dbh->prepare('insert into aluno(id, nome, email, password, tipo) values(?, ?, ?, ?, ?)');
				$stmt->execute(array('null',$nome,$email,$password, $perfil));

				echo("<script>alert('Registo realizado!'); window.location.href='login.php';</script>");
				
			}else{if($num1 != 0){
				echo("<script>alert('Já Registado!'); window.location.href='login.php';</script>");
				}
				else{
					echo("<script>alert('Email não Validado! Valide o Email na Secretaria!'); window.location.href='registar.php';</script>");

				}
			}
		}else{
			if($perfil == 'Professor'){
				$stmt = $dbh->prepare('select * from email_prof where email = ?');
				$stmt->execute(array($email));
				$num = $stmt->rowCount();
		
				$stmt = $dbh->prepare('select * from professor where email = ?');
				$stmt->execute(array($email));
				$num1 = $stmt->rowCount();
		
		
		
				if($num == 1 and $num1 == 0){
		
					$stmt = $dbh->prepare('insert into professor(id, nome, email, password, tipo) values(?, ?, ?, ?, ?)');
					$stmt->execute(array('null',$nome,$email,$password, $perfil));
					echo("<script>alert('Registo realizado!'); window.location.href='login.php';</script>");

				}else{if($num1 != 0){
					echo("<script>alert('Já Registado!'); window.location.href='login.php';</script>");
					}
					else{
						echo("<script>alert('Email não Validado! Valide o Email na Secretaria!'); window.location.href='registar.php';</script>");

					}
				}


		
	}}} else{
		echo("<script>alert('Passwords não coincidem!'); window.location.href='registar.php';</script>");
	}

	

	?>



