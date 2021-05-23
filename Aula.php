<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');
  include_once('snippets/Session.php');
  $id_uc = $_GET['id_uc'];
  $id_aula = $_GET['id_aula'];


    $turma = $_SESSION["turma"];

    $stmt = $dbh->prepare('SELECT aula.id, aula.data2, uc.id_uc from aula, uc where uc.id_uc = aula.id_uc and uc.id_uc = ?');
    $stmt->execute(array($id_uc));
    $result = $stmt->fetchAll();

    if(isset($_POST['submitP'])){
        if($_SESSION['tipo'] == 'Aluno'){
            $presenca = $_POST['inlineRadioOptions'];
            $stmt = $dbh->prepare('SELECT * From marca where id_aluno = ? and id_aula = ?');
            $stmt->execute(array($_SESSION['id'] ,$id_aula));
            $presmarcada = $stmt->fetch();
            ;

            if (empty($presmarcada)){
                $stmt = $dbh->prepare('INSERT into marca(id_aluno, id_aula, presencas) Values(?,?,?) ');
                $stmt->execute(array( $_SESSION['id'], $id_aula, $presenca));
            }else echo'<script>alert("Já marcou presença!")</script>';
            
    
    }}
  ?>

  <!DOCTYPE html>
  <html lang="pt">
  <head>
      <?php include('snippets/head.php') ?>
      <title>UC</title>
  </head>
  <body> 
  <?php 
    include('snippets/menu.php')
  ?>

  <div class="container-fluid">
            <h1 style="text-align: center; font-size: 80px">Presenças</h1>
        </div>
        <br>   
  <form action="" method="POST">
                        <div class="form-group ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Presente">
                                <label class="form-check-label" for="inlineRadio1">Presente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Falta">
                                <label class="form-check-label" for="inlineRadio2">Falta</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <button type="submit" name="submitP" class="btn btn-primary">Selecionar</button>
                                <a href="UC.php?id=<?php echo $id_uc; ?>" class="btn btn-primary">Voltar</a>
                            </div>
                        </div>
                     </form> 
    
  </body>
  </html>