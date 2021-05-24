<?php 
    include_once('snippets/startDB.php');
    include_once('snippets/SessionAdmin.php');


    $stmt = $dbh->prepare('SELECT id FROM aluno;');
    $stmt->execute();
    $numaluno = $stmt->fetchColumn();
        
    $stmt = $dbh->prepare('SELECT id FROM professor;');
    $stmt->execute();
    $numprof = $stmt->fetchColumn();

    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>

    <div class="col-md-11">
        <h1 style="text-align: center; font-size: 80px">Home</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-7 ">

            <form>
                <div class="form-group row">
                    <label for="inputNAlunos" class="col-sm-4 col-form-label">Numero de Alunos:</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="inputNAlunos" placeholder="Nalunos" value="<?php echo $numaluno ?>" readonly>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="inputNProfessores" class="col-sm-4 col-form-label">Numero de Professores</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="inputNProfessores" placeholder="Nprofessores" value="<?php echo $numprof ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
</body>
</html>