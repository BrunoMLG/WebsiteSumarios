<?php
    include("snippets/startDB.php");
   
    if (!isset($_GET['id'])){
        header('location:painel_administracao.php');
        die();
    }  
    else{
        $id = $_GET['id'];
    }


    $stmt = $dbh->prepare('SELECT * FROM uc');
    $stmt->execute();
    $UC = $stmt->fetchAll();

    $stmt = $dbh->prepare('SELECT uc.nome, tem.id_uc from uc, tem, turma where uc.id_uc = tem.id_uc and turma.id_turma = ? and turma.id_turma = tem.id_turma');
    $stmt->execute(array($id));
    $temuc = $stmt->fetchALL();

   
        $stmt = $dbh->prepare('SELECT * FROM Turma WHERE id_turma = ?');
        $stmt->execute(array($id));
        $TurmaE = $stmt->fetch();
    
    if(isset($_POST['delete'])) {
        $stmt = $dbh->prepare('DELETE FROM turma WHERE id_turma= ?');
        $stmt->execute(array($id));
        header('location:painel_administracao.php');
    }

    if(isset($_POST['save'])){
        $curso = $_POST['curso'];
        $ano = $_POST['ano'];
        $semestre = $_POST['semestre'];
        $stmt = $dbh->prepare('update turma set curso = ?, ano = ?, semestre = ? where id_turma= ?');
		$stmt->execute(array($curso, $ano, $semestre, $id));

    }


    if(isset($_POST['add'])){
        $ucadd = $_POST['ucadd'];
        
        $stmt = $dbh->prepare('INSERT into tem(id_turma, id_uc) values(?, ?)');
		$stmt->execute(array($id , $ucadd ));
        header('location:editTurma.php?id='. $id);

    }

?>


<!DOCTYPE html>
<html lang="pt-pt">
<head>
   <?php include('snippets/head.php') ?>
</head>
<body>

    <h1>Turma </h1>
    <form method="POST">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Ano</th>
            <th>Semestre</th>
            <th>Guardar</th>
            <th>Apagar</th>
        </tr>
        <tr>
            <td><input type="text" class="form-control" name="id1" readonly value="<?php echo $TurmaE['id_turma'] ?>"></a></td>          
            <td><select class="form-control" name ="curso" id="curso" required>
                    <option value="Licenciatura de Informatica" <?php if($TurmaE['curso'] == 'Licenciatura de Informatica'){echo("selected");}?> name="LicInf">Licenciatura de Informatica</option>
                    <option value="Licenciatura de Multimedia" <?php if($TurmaE['curso'] == 'Licenciatura de Multimedia'){echo("selected");}?> name="LicMult">Licenciatura de Multimedia</option>
                </select></td>  
                <td><input type="number" class="form-control" name="ano"  value="<?php echo $TurmaE['ano'] ?>"></a></td>   
            <td><input type="number" class="form-control" name="semestre"  value="<?php echo $TurmaE['semestre'] ?>"></a></td>             
            <td><input type="submit" name="save" class="btn btn-primary" value="Guardar"></td>       
            <td><input  type="submit" name="delete" class="btn btn-danger" value="Apagar"></td>                 
        </tr>

    </table>  
    </form>

    <form method="POST">
    <table class="table">
        <tr>
            <th>Unidades Curriculares</th>
            <th>Adicionar</th>
        </tr>
        <tr>
            <td><select class="form-control" name ="ucadd" id="curso" required>
                <?php foreach($UC as $row){
                     echo('<option value="') 
                ?> 
                
                <?php
                    echo ($row['id_uc'] . '">');  
                ?> 

                <?php
                    echo ($row['nome']); echo('</option>') 
                ?> 
                <?php 
                    } 
                ?>
                </select>
                <td><input type="submit" name="add" class="btn btn-primary" value="Adicionar"></td>                           
        </tr>

                   
        </tr>

    </table>  
    </form>


    <form method="POST">

    <table class="table">
        <tr>
            <th>Unidades Curriculares</th>
            <th>Remover</th>
        </tr>
       

        <?php foreach($temuc as $row1){ ?>
            <tr>
            <td><input type="text" class="form-control" name="id2" readonly value="<?php echo $row1['nome'] ?>"></a></td>          
            <td><a href="removertemuc.php?id_uc=<?php echo($row1['id_uc'])?>&id_turma=<?php echo($id)?>" class="btn btn-danger">Remover</a></td>  

            </tr>
        <?php 
                } 
        ?>                         
        </tr>
    </table>  
    </form>
    <a class="btn btn-primary" href="painel_administracao.php">Voltar</a>

</body>
</html>







