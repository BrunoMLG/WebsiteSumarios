<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');
  include_once('snippets/SessionAdmin.php');
  $id_uc = $_GET['id_uc'];
  $id_aula = $_GET['id_aula'];



    $stmt = $dbh->prepare('SELECT aluno.id, aluno.nome, marca.presencas from aluno, marca, uc where marca.id_aluno = aluno.id and marca.id_aula = ? and uc.id_uc = ?');
    $stmt->execute(array($id_aula, $id_uc));
    $result = $stmt->fetchAll();

    
    $stmt = $dbh->prepare('SELECT aula.id, aula.data2, uc.id_uc, aula.id_sum, sumario.sumario from aula, uc, sumario where uc.id_uc = aula.id_uc and sumario.id = aula.id_sum and uc.id_uc = ? and aula.id=?');
    $stmt->execute(array($id_uc, $id_aula));
    $result1 = $stmt->fetch();

  ?>

  <!DOCTYPE html>
  <html lang="pt">
  <head>
      <?php include('snippets/head.php') ?>
      <title>UC</title>
  </head>
  <body> 
  
        <br>
        <!-- <div style="text-align: center;">
        <form action="" method="POST"> -->
        
                  
                
                <h1 style="text-align: center; font-size: 80px">Sumario</h1>
                        <textarea  name="sumario" readonly style="  display: block; margin-left: auto; margin-right: auto; width: 300px; "><?php echo $result1['sumario']; ?></textarea>
                        <h1 style="text-align: center; font-size: 80px">Presenças</h1>
                        <div class="col-md-6 offset-md-3" style="background-color: rgba(255,255,255,0.5);">
                        <table class="table">
                <?php foreach($result as $row){
                     ?>
                    
                    
                    <tr><td>ALUNO:</td>                      
                                <?php
                                    echo '<td><input type="text" class="form-control" name ="aluno'.$row['id'].'" value="' .$row["nome"].'" readonly></td>'; 
                                     
                                ?>    
                    
                   
                    <?php if($row['presencas'] == "Falta"){echo( '<td><input style=" background-color: red; text-align: center;" type="text" class="form-control" value="'.$row['presencas'].'"></td>');}else{
                        echo( '<td> <input style=" background-color: green; text-align: center;" type="text" class="form-control" value="'.$row['presencas'].'"></td></tr>');} }?>
                    
                        </table>
                     <div class="col-sm-1">
                        <a href="painel_administracao.php" class="btn btn-primary" >Voltar</a>
                </div>
                        </div>
            
        
        <!-- </form>
        </div> -->
  </body>
  </html>