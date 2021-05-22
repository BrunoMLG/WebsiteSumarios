<?php
$stmt = $dbh->prepare('select email from email_aluno ');
$stmt->execute();
$result = $stmt->fetchAll();

$stmt = $dbh->prepare('select email from email_prof ');
$stmt->execute();
$result1 = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>

    <div class="col-md-11">
        <h1 style="text-align: center; font-size: 80px">Codigos de Login</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 ">
            <p>Alunos:</p>
            <form action="gerar_email.php" method="POST">
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-2">
                        <input type="email" class="form-control" name ="email" id="email" required>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div><br>
                <br>


                <div class="form-group row col-sm-7">
                    <P>Emials Recentes:</P>
                    <!-- <input type="text"class="form-control " name ="alunoR"   readonly> -->
                     <table class="table">
                        <tr>
                            <th>Email</th>
                        </tr>
                        <?php
                            foreach($result as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['email'] ?></a></td>                            
                        </tr>

                        <?php 
                        }
                        ?> 
                     </table>  
                </div>
            </form>    
        </div>

        <div class="col-md-6 ">
        <p>Professores:</p>
        <form action="gerar_email_profs.php" method="POST">
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-2">
                        <input type="email" class="form-control" name ="email" id="email" required>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div><br>
                <br>
                <div class="form-group row row col-sm-7">
                    <P>Emials Recentes:</P>
                     <table class="table">
                        <tr>
                            <th>Email</th>
                        </tr>
                        <?php
                            foreach($result1 as $row1){
                        ?>
                        <tr>
                           <td><?php echo $row1['email'] ?></a></td>                            
                        </tr>

                        <?php 
                        }
                        ?> 
                     </table>  
                </div>
            </form>    
        </div>

    </div>
</body>
</html>