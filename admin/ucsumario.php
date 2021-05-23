<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');

   
        $stmt = $dbh->prepare('SELECT nome, id_uc from uc ');
        $stmt->execute();
        $result = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Disciplinas</title>
  
</head>
<body>
	
    
      <div class="container-fluid">
        <h1 style="text-align: left; font-size: 40px">Disciplinas</h1>
        <?php
    
	    ?>
    </div>
<br>

<table class="table">
      
        <?php
            foreach($result as $row){
        ?>
        <tr>
            <td><a class="form-control" href="allsumadmin.php?id=<?php echo $row['id_uc']; ?> "><?php echo $row['nome'] ?></a></td>          
                                    
        </tr>

        <?php 
        }
        ?> 
    </table>  

</body>
</html>
