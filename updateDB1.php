<?php
  include('snippets/startDB.php');
  


$email = $_POST['inputEmail'];
$nome = $_POST['inputNome'];
$telemovel = $_POST['inputTelemovel'];
$morada = $_POST['inputMorada'];
$turma = $_POST['inputTurma'];
$id = $_POST[$id];
if($_SESSION["tipo"] == 'Aluno'){
		$stmt = $dbh->prepare('update aluno set nome = ?, telemovel = ?, morada = ?,id_turma = ? where id= ?');
		$stmt->execute(array($nome, $telemovel, $morada, $turma, $_SESSION["id"]));
        
        }else{
            if($_SESSION["tipo"] == 'Professor'){
                $stmt = $dbh->prepare('update professor set nome = ?, telemovel = ?, morada = ? where id= ?');
                $stmt->execute(array($nome, $telemovel, $morada, $_SESSION["id"]));
                echo('professor alterado');
            
            }else
            echo('Erro!');
            

        }
        

?>