<?php
    include("snippets/startDB.php");
   
    if (!isset($_GET['id'])){
        header('location:painel_administracao.php');
        die();
    }  
    else{
        $id = $_GET['id'];
    }


    $stmt = $dbh->prepare('SELECT * FROM uc where id_uc = ?');
    $stmt->execute(array($id));
    $UC = $stmt->fetch();

    
    if(isset($_POST['delete'])) {
        $stmt = $dbh->prepare('DELETE FROM uc WHERE id_uc= ?');
        $stmt->execute(array($id));
        header('location:painel_administracao.php');
    }

    if(isset($_POST['save'])){
        $uc = $_POST['uc'];
        $horas = $_POST['horas'];
        $stmt = $dbh->prepare('update uc set nome = ?, horas = ? where id_uc = ?');
		$stmt->execute(array($uc, $horas, $id));
        $stmt = $dbh->prepare('update leciona set id_prof= ? where id_uc= ?');
        $stmt->execute(array($_POST['prof'], $id));
        header('location:editUC.php?id='. $id);

    }

$stmt = $dbh->prepare('SELECT id, nome from professor, leciona where leciona.id_prof = professor.id and leciona.id_uc = ?');
$stmt->execute(array($id));
$profs = $stmt->fetch();

$stmt = $dbh->prepare('SELECT id, nome from professor');
$stmt->execute();
$profsAll = $stmt->fetchAll();


?>


<!DOCTYPE html>
<html lang="pt-pt">
<head>
   <?php include('snippets/head.php');  ?>
  
</head>
<body>

    <h1>UC </h1>
    <form method="POST">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>UC</th>
            <th>Horas</th>
            <th>Professor</th>
            <th>Guardar</th>
            <th>Apagar</th>
        </tr>
        <tr>
            <td><input type="number" class="form-control" name="id1" readonly value="<?php echo $id ?>"></a></td>          
                <td><input type="text" class="form-control" name="uc"  value="<?php echo $UC['nome'] ?>"></a></td>   
                <td><input type="number" class="form-control" name="horas" value="<?php echo $UC['horas'] ?>"></a></td>  
                <td><select class="form-control" name ="prof" id="prof" required>
                <?php foreach($profsAll as $row){
                     echo('<option value="') 
                ?> 
                
                 <?php
                    echo ($row['id'] . '"');  
                    if($row['id'] == $profs['id']){echo(" selected>");}else echo '>'
                ?>  

                <?php
                    echo ($row['nome']); echo('</option>') 
                ?> 
                <?php 
                    } 
                ?>
                </select>  </td>
            <td><input type="submit" name="save" class="btn btn-primary" value="Guardar"></td>       
            <td><input  type="submit" name="delete" class="btn btn-danger" value="Apagar"></td>                 
        </tr>

    </table>  
    </form>

    <a class="btn btn-primary" href="painel_administracao.php">Voltar</a>

</body>
</html>