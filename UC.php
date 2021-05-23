<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');
  include_once('snippets/Session.php');
  $id_uc = $_GET['id'];

  $stmt = $dbh->prepare('SELECT * from uc where id_uc = ?');
  $stmt->execute(array($id_uc));
  $uc = $stmt->fetch();


    if($_SESSION["tipo"]=='Aluno'){
        $turma = $_SESSION["turma"];

        $stmt = $dbh->prepare('SELECT aula.id, aula.data2, uc.* from aula, uc where uc.id_uc = aula.id_uc and uc.id_uc = ?');
        $stmt->execute(array($id_uc));
        $result = $stmt->fetchAll();

       
    }else if($_SESSION["tipo"]=='Professor'){
        $stmt = $dbh->prepare('SELECT aula.id, aula.data2, uc.* from aula, uc where uc.id_uc = aula.id_uc and uc.id_uc = ?');
        $stmt->execute(array($id_uc));
        $result = $stmt->fetchAll();}
  ?>

  <!DOCTYPE html>
  <html lang="pt">
  <head>
      <?php include('snippets/head.php') ?>
      <title><?php echo $uc['nome']; ?></title>
  </head>
  <body>    
  <?php 
    include('snippets/menu.php')
  ?>
  <table class="table">
  <div class="container-fluid">
            <h1 style="text-align: center; font-size: 80px"><?php echo $uc['nome']; ?></h1>
        </div>
        <br>   
        <tr><b><p style="font-size: 22px;">Numero de Horas Totais: <?php echo $uc['horas']; ?></p></b></tr>
        <br>
        <tr><b><p style="font-size: 22px;">Aulas: </p></b></tr>
        <?php
            foreach($result as $row){
        ?>
        <tr>
            <td><a class="form-control" href="Aula.php?id_uc=<?php echo $id_uc; ?>&id_aula=<?php echo $row['id']; ?> "><?php echo $row['data2'] ?></a></td>          
                                    
        </tr>

        <?php 
        }
        ?> 
    </table>  
      <a href="lista_disc.php" class="btn btn-primary" >Voltar</a>
  </body>
  </html>