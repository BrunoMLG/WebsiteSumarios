<?php


$stmt = $dbh->prepare('select id, nome, tipo from aluno UNION select id, nome, tipo from professor');
$stmt->execute();
$num = $stmt->rowCount(); 


$result = $stmt->fetchAll();
//print_r($result);
?>

<html>
    <body>
            <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Editar</th>
            </tr>
            <?php
                foreach($result as $row){
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['nome'] ?></a></td>
                <td><?php echo $row['tipo'] ?></a></td>
                <td><a>Editar</a></td>
                
            </tr>

            <?php 
            }
            ?>
    </body>

</html>