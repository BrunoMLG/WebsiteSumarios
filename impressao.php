<script type="text/javascript">
 window.onload = function() { window.print(); }
</script>
<?php 
$id_uc = $_GET['id_uc'] ;
$id_aula = $_GET['id_aula'] ;

    include('snippets/startDB.php');

    $stmt = $dbh->prepare('SELECT aula.id, aula.data2,aula.duracao, aula.hora_ini, aula.hora_fim, uc.id_uc, aula.id_sum, aula.tipo, aula.modo, sumario.sumario,uc.nome from aula, uc, sumario where uc.id_uc = aula.id_uc and sumario.id = aula.id_sum and uc.id_uc = ? and aula.id=?');
    $stmt->execute(array($id_uc, $id_aula));
    $result = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <?php include('snippets/head.php') ?>
    <link rel="stylesheet" href="impressao.css?v=<?php echo time(); ?>"></head>
    <style >
    body {
    overflow-y: hidden;
    overflow-x: hidden;
    background-image: url("images/white.jpg");
    background-size: 90%;
   
  } </style>
    <title >Impressão</title>
</head>
<body onload="window.print()">
    <img src="images/LogoPorto.png">
    <h1 style="text-align: center;">Unidade Curricular: <?php echo $result['nome'] ?></h1><br>
    
    <br><?php echo '<p style="text-align: center;"> Tipo de Aula: ' .$result['tipo']. '</p>' ?>
        <?php echo '<p style="text-align: center;"> Modo de Aula: ' .$result['modo']. '</p>' ?>

        <table style="width:100%">
  <tr>
    <th>Informação</th>
    <th>Sumário</th>
    <th>Rubrica</th>
  </tr>
  <tr>
    <td>Duração: <?php echo $result['duracao'] ?>h
    <br> Data: <?php echo $result['data2'] ?>
    <br>Horário das <?php echo $result['hora_ini']  ?> h <br> As <?php echo $result['hora_fim']  ?> h  </td>
    <td><?php echo $result['sumario']  ?></td>
    <td> </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>