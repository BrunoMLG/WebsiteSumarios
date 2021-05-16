<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'websitesumarios');

$email = $_POST['email'];
$nome = $_POST['nome'];
$password = $_POST['password'];
$passwordc = $_POST['passwordc'];

if($password == $passwordc){
	$s = "select * from email_aluno where email = '$email'";
	$s1 = "select * from aluno where email = '$email'";

	$result = $conn->query($s);
	$result1 = $conn->query($s1);

	$num = mysqli_num_rows($result);
	$num1 = mysqli_num_rows($result1);


	if($num == 1 and $num1 == 0){
		$criarconta = "insert into aluno(id_aluno, nome, email, password) values(null,'$nome','$email','$password')";
		$conn->query($criarconta);
		echo("Registo realizado!");
	}else{if($num1 != 0){
		echo("Email já registado!");}
		else{
			echo("Email não validado!");
		}
	}
} else{
	echo("Password não coincide!");
}



?>