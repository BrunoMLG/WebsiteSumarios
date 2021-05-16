<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'websitesumarios');

$email = $_POST['email'];

$s = "select * from email_aluno where email = '$email'";

$result = $conn->query($s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo("Email ja existente!");
    // ("'$result'");
}else{
    $addmail = "insert into email_aluno(email) values ('$email')";
    $conn->query($addmail);
    echo("Email Adicionado!");
}
?>