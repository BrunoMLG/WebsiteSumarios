 <?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');
  include_once('snippets/Session.php');

    if($_SESSION["tipo"]=='Aluno'){
        $turma = $_SESSION["turma"];

        $stmt = $dbh->prepare('SELECT uc.nome, uc.id_uc from uc, tem where uc.id_uc = tem.id_uc and tem.id_turma = ? ');
        $stmt->execute(array($turma));
        $result = $stmt->fetchAll();
    }else if($_SESSION["tipo"]=='Professor'){
        $stmt = $dbh->prepare('SELECT uc.nome, uc.id_uc from uc, leciona where uc.id_uc = leciona.id_uc and leciona.id_prof = ? ');
        $stmt->execute(array($_SESSION['id']));
        $result = $stmt->fetchAll();}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Disciplinas</title>
  
</head>
<body>
	<?php
		include_once('snippets/menu.php');
	?>
    
      <div class="container-fluid">
        <h1 style="text-align: left; font-size: 40px">Disciplinas</h1>
        <?php
    
	    ?>
    </div>
<br>

<table class="table">
      
        <?php
            foreach($result as $row){
        ?>
        <tr>
            <td><a class="form-control" href="UC.php?id=<?php echo $row['id_uc']; ?> "><?php echo $row['nome'] ?></a></td>          
                                    
        </tr>

        <?php 
        }
        ?> 
    </table>  

</body>
</html>
