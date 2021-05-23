<?php
  include_once('snippets/head.php');
  include_once('snippets/startdb.php');
  include_once('snippets/Session.php');


  $presenca ='';
  $id_aula ='';
  $sumario1['Sumario'] = '';


if($_SESSION['tipo'] == 'Professor'){
  $stmt = $dbh->prepare('SELECT uc.nome, uc.id_uc FROM uc, leciona where leciona.id_uc = uc.id_uc and leciona.id_prof = ?');
  $stmt->execute(array($_SESSION['id']));
  $UC = $stmt->fetchAll();
}else if($_SESSION['tipo'] == 'Aluno'){
            $stmt = $dbh->prepare('SELECT uc.nome, uc.id_uc FROM uc, tem where tem.id_uc = uc.id_uc and tem.id_turma = ?');
            $stmt->execute(array($_SESSION['turma']));
            $UC = $stmt->fetchAll();
        }

        if(isset($_POST['submitProf'])){
            if($_SESSION['tipo'] == 'Professor'){
                $data = $_POST['inputData'];
                $horai = $_POST['inputHoraI'];
                $horaf = $_POST['inputHoraF'];
                $modo = $_POST['inputModo'];
                $tipo = $_POST['inputTipo'];
                $uc1 = $_POST['inputUC'];
                $sumario = $_POST['inputSumario'];
                $duracao = $_POST['inputDuracao'];


                $stmt = $dbh->prepare('INSERT into sumario(id, sumario) Values(?,?) ');
                $stmt->execute(array('null', $sumario));

                $stmt = $dbh->prepare('SELECT id from sumario order by id DESC limit 1');
                $stmt->execute();
                $sumarioCriado = $stmt->fetch();
                $stmt = $dbh->prepare('INSERT into aula(id, data2, hora_ini, hora_fim, duracao, modo, tipo, id_sum, id_uc) Values(null,?,?,?,?,?,?,?,?) ');
                $stmt->execute(array( $data, $horai, $horaf, $duracao, $modo, $tipo, $sumarioCriado['id'], $uc1));
                
            }
        }

        

        if(isset($_POST['pesquisa'])){
            if($_SESSION['tipo'] == 'Aluno'){
                $data = $_POST['inputData'];
                $horai = $_POST['inputHoraI'];
                $uc1 = $_POST['inputUC'];
                

                $stmt = $dbh->prepare('SELECT * From aula where data2 = ? and hora_ini = ? and id_uc = ? ');
                $stmt->execute(array($data, $horai, $uc1));
                $Aula1 = $stmt->fetch();
                $id_aula = $Aula1['id'];

                $stmt = $dbh->prepare('SELECT * From sumario where id = ? ');
                $stmt->execute(array($Aula1['id_sum']));
                $sumario1 = $stmt->fetch();
                
                
            }
        }

        if(isset($_POST['submitP'])){
            if($_SESSION['tipo'] == 'Aluno'){
                
                header("Location: lista_disc.php");

            }
        }
        // if(isset($_POST['submitP'])){
        //     if($_SESSION['tipo'] == 'Aluno'){
        //         $presenca = $_POST['inlineRadioOptions'];
        //         $stmt = $dbh->prepare('SELECT * From marca where id_aluno = ? and id_aula = ?');
        //         $stmt->execute(array($_SESSION['id'] ,$id_aula));
        //         $presmarcada = $stmt->fetch();

        //         if (empty($presmarcada)){
        //             $stmt = $dbh->prepare('INSERT into marca(id_aluno, id_aula, presencas) Values(?,?,?) ');
        //             $stmt->execute(array( $_SESSION['id'], $id_aula, $presenca));}
                
        
        // }}
        




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sumarios</title>
</head>
<body>
	<?php
	  include_once('snippets/menu.php');
      if($_SESSION['tipo'] == 'Aluno'){
          
	?>
		
        <div class="container-fluid">
            <h1 style="text-align: center; font-size: 80px">Sumarios</h1>
        </div>
        <br>
        <form action="" method="POST">
        <div class="row">
            <div class="col-md-7">
               
                <div class="form-group row">
                    <label for="inputUC" class="col-sm-3 col-form-label">Unidade Curricular: </label>
                    <div class="col-sm-6">
                            <select class="form-control" name ="inputUC" id="curso" required>
                                <?php foreach($UC as $row){
                                    echo('<option ') 
                                ?> 
                                
                                <?php
                                    echo (' value="'.$row['id_uc'] . '"> ');  
                                ?> 

                                <?php
                                    echo ($row['nome']); echo('</option>') 
                                ?> 
                                <?php 
                                    } 
                                ?>
                            </select>
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="inputData" class="col-sm-3 col-form-label">Data: </label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="inputData" placeholder="Data">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputHora" class="col-sm-3 col-form-label">Hora Inicial: </label>
                        <div class="col-sm-6">
                            <input type="time" step="1800" class="form-control" name="inputHoraI" placeholder="Hora">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-3">
                            <br><button type="submit" name="pesquisa" class="btn btn-primary">Pesquisar</button><br><br>
                        </div>
                    </div>
                 
            </div>
            <div class="col-md-4">
                <div class="offset-sm-0">
                    <textarea class="form-control" name="sumario" readonly><?php  echo'Sumario:   '. $sumario1['Sumario']; ?></textarea ><br>
                    <!-- <form action="" method="POST">
                        <div class="form-group ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Presente">
                                <label class="form-check-label" for="inlineRadio1">Presente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Falta">
                                <label class="form-check-label" for="inlineRadio2">Falta</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <button type="submit" name="submitP" class="btn btn-primary">Selecionar</button>
                            </div>
                        </div>
                     </form>  -->
                     
                    <div  class="col-md-4">
                        <button type="submit" name="submitP" class="btn btn-primary">Marcar Presença</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

                <?php }else if($_SESSION['tipo'] == 'Professor'){?>
                    <div class="container-fluid">
                        <h1 style="text-align: center; font-size: 80px">Sumarios</h1>
                    </div>
                    <br>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-7">
                                
                                    <div class="form-group row">
                                        <label for="inputUC" class="col-sm-3 col-form-label">Unidade Curricular: </label>
                                        <div class="col-sm-6">
                                                <select class="form-control" name ="inputUC" id="curso" required>
                                                    <?php foreach($UC as $row){
                                                        echo('<option ') 
                                                    ?> 
                                                    
                                                    <?php
                                                        echo (' value="'.$row['id_uc'] . '"> ');  
                                                    ?> 

                                                    <?php
                                                        echo ($row['nome']); echo('</option>') 
                                                    ?> 
                                                    <?php 
                                                        } 
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputData" class="col-sm-3 col-form-label">Data: </label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" name="inputData" placeholder="Data">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputHoraI" class="col-sm-3 col-form-label">Hora Incial: </label>
                                            <div class="col-sm-6">
                                                <input type="time" step="1800" class="form-control" name="inputHoraI" placeholder="Hora Inicial">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputHoraF" class="col-sm-3 col-form-label">Hora Final: </label>
                                            <div class="col-sm-6">
                                                <input type="time" step="1800" class="form-control" name="inputHoraF" placeholder="Hora Final">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputHoraF" class="col-sm-3 col-form-label">Duração: </label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="inputDuracao" placeholder="Duração">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputModo" class="col-sm-3 col-form-label">Modo: </label>
                                            <div class="col-sm-6">
                                                <select name="inputModo" class="form-control" name="inputModo">
                                                    <option value="sincrona">Síncrona</option>
                                                    <option value="assincrona">Assíncrona</option>
                                                    <option value="presencial">Presencial</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputTipo" class="col-sm-3 col-form-label">Tipo: </label>
                                            <div class="col-sm-6">
                                                <select name="inputTipo" class="form-control" name="inputTipo">
                                                    <option value="aula">Aula</option>
                                                    <option value="orientacao">Orientação</option>
                                                </select>
                                            </div>
                                    </div>
                    
                                   
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control" name="inputSumario" ></textarea ><br>
                                <button type="submit" class="btn btn-primary" name="submitProf">Submeter</button>
                            </div>
                        </div>
                                
                    </form>
                <?php } 
                ?>
     
    
    
</body>
</html>