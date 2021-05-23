<?php
$stmt = $dbh->prepare('select * from turma ');
$stmt->execute();
$result = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="pt">
<head>
</head>
<body>
    <div class="col-md-11">
        <h1 style="text-align: center; font-size: 80px">Turmas</h1>
    </div>
    <br>
    <form action="gerar_turma.php" method="POST">
        <div class="form-group row">
            <label for="UC" class="col-sm-3 col-form-label">Curso:</label>
            <div class="col-sm-4">
                <select class="form-control" name ="curso" id="curso" required>
                    <option value="Licenciatura de Informatica" name="LicInf">Licenciatura de Informatica</option>
                    <option value="Licenciatura de Multimedia" name="LicMult">Licenciatura de Multimedia</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="UC" class="col-sm-3 col-form-label">Ano:</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name ="ano" id="ano" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="UC" class="col-sm-3 col-form-label">Semestre:</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name ="semestre" id="semestre" required>
            </div>
        </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </div>
        <br>
    </form>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Ano</th>
            <th>Semestre</th>
            <th>Editar</th>
        </tr>
        <?php
            foreach($result as $row){
        ?>
        <tr>
            <td><?php echo $row['id_turma'] ?></a></td>          
            <td><?php echo $row['curso'] ?></a></td>  
            <td><?php echo $row['ano'] ?></a></td>   
            <td><?php echo $row['semestre'] ?></a></td>    
            <td><a href="editTurma.php?id=<?php echo $row['id_turma']?>">Editar</a></td>                            
        </tr>

        <?php 
        }
        ?> 
    </table>  
</body>
</html>