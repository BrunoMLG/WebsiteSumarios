<?php
include('snippets/startDB.php');

// session_start();
// $conn = new mysqli('localhost', 'root', '', 'websitesumarios');

$email = $_POST['email'];

// $s = "select * from email_aluno where email = '$email'";
// $result = $conn->query($s);
// $num = mysqli_num_rows($result);

$stmt = $dbh->prepare('select * from email_prof where email = ?');
	$stmt->execute(array($email));
	$num = $stmt->rowCount();

if($num == 1){
    echo("Email ja existente!");
    // ("'$result'");
}else{
    // $addmail = "insert into email_aluno(email) values ('$email')";
    // $conn->query($addmail);

    $stmt = $dbh->prepare('insert into email_prof(email) values (?)');
	$stmt->execute(array($email));

    echo("Email Adicionado!");
}
?>