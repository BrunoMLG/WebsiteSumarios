<?php
$stmt = $dbh->prepare('select nome, horas from uc ');
$stmt->execute();
$result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
</head>
<body>
<div class="col-md-11">
        <h1 style="text-align: center; font-size: 80px">Codigos de Login</h1>
    </div>
    <br>
    <form action="gerar_UC.php" method="POST">
                    <div class="form-group row">
                        <label for="UC" class="col-sm-3 col-form-label">UC:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name ="UC" id="UC" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="UC" class="col-sm-3 col-form-label">Horas da UC:</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name ="horas" id="horas" required>
                        </div>
                    
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </div>
                    <br>
    </form>

    <table class="table">
        <tr>
            <th>UC</th>
            <th>Horas</th>
            <th>Editar</th>
        </tr>
        <?php
            foreach($result as $row){
        ?>
        <tr>
            <td><?php echo $row['nome'] ?></a></td>          
            <td><?php echo $row['horas'] ?></a></td>   
            <td><a>Editar</a></td>                            
        </tr>

        <?php 
        }
        ?> 
    </table>  
</body>
</html>