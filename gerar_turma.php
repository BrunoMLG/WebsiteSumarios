<?php
include('snippets/startDB.php');

$curso = $_POST['curso'];
$ano = $_POST['ano'];
$semestre = $_POST['semestre'];

$stmt = $dbh->prepare('insert into turma(id_turma, curso, ano, semestre) values (?, ?, ?, ?)');
$stmt->execute(array('null', $curso, $ano, $semestre));

header('Location: painel_administracao.php');

?>