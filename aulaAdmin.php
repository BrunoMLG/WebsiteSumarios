<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');
  include_once('snippets/SessionAdmin.php');
  $id_uc = $_GET['id_uc'];
  $id_aula = $_GET['id_aula'];



    $stmt = $dbh->prepare('SELECT aluno.id, aluno.nome, marca.presencas from aluno, marca, uc where marca.id_aluno = aluno.id and marca.id_aula = ? and uc.id_uc = ?');
    $stmt->execute(array($id_aula, $id_uc));
    $result = $stmt->fetchAll();
  ?>

  <!DOCTYPE html>
  <html lang="pt">
  <head>
      <?php include('snippets/head.php') ?>
      <title>UC</title>
  </head>
  <body> 
  

  <div class="container-fluid">
            <h1 style="text-align: center; font-size: 80px">Presenças</h1>
        </div>
        <br>
        <form action="" method="POST">
        <div class="row">
            <div class="col-md-7">
               
                <div class="form-group row">
                <?php foreach($result as $row){
                    echo'<label for="inputUC" class="col-sm-3 col-form-label">Aluno : </label>' ?>
                    <div class="col-sm-6">
                                <?php
                                    echo '<input type="text" class="form-control" name ="aluno'.$row['id'].'" value="' .$row["nome"].'" readonly> Presença: ' .$row['presencas']; ; 
                                     }
                                ?>    
                    </div>
                </div>
                <div class="col-sm-6">
                <a href="painel_administracao.php" class="btn btn-primary" >Voltar</a></div>
  </body>
  </html>