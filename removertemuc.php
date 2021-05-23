<?php
    include("snippets/startDB.php");
    if (!isset($_GET['id_turma'])and !isset($_GET['id_uc'])){
        header('location:painel_administracao.php');
        die();
    }  
    else{
        $id_uc = $_GET['id_uc'];
        $id_turma = $_GET['id_turma'];
        
    }


    $stmt = $dbh->prepare('DELETE FROM tem WHERE id_turma= ? and id_uc= ?');
    $stmt->execute(array($id_turma, $id_uc));
    header('location:editTurma.php?id='. $id_turma);
?>