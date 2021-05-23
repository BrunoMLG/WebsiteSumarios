<?php
$stmt = $dbh->prepare('select id_uc ,nome, horas from uc ');
$stmt->execute();
$result = $stmt->fetchAll();

$stmt = $dbh->prepare('select id, nome from professor ');
$stmt->execute();
$profs = $stmt->fetchAll();
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
                    </div>
                    <div class="form-group row">
                        <label for="UC" class="col-sm-3 col-form-label">Professor da UC:</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="listProfs" >
                                <?php foreach($profs as $row1){ ?>
                                <option value="<?php echo($row1['id'])?>"><?php echo $row1['nome'] ?></option> 
                            
                        
                                <?php 
                                        } 
                                ?>               
                              </select>
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
            <td><a href="editUC.php?id=<?php echo $row['id_uc']?>">Editar</a></td>                            
        </tr>

        <?php 
        }
        ?> 
    </table>  
</body>
</html>