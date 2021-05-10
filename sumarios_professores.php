<?php
  include_once('snippets/head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>      
    <title>Sumarios Professores</title>
</head>
<body>

    <?php
        include_once('snippets/menu_prof.php');
    ?>

      <div class="container-fluid">
        <h1 style="text-align: center; font-size: 80px">Sumarios</h1>
    </div>
<br>
    

            <form>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group row">
                            <label for="inputUC" class="col-sm-3 col-form-label">Unidade Curricular: </label>
                            <div class="col-sm-6">
                                <select name="perfil" id="pref" class="form-control">
                                    <option value="SelecUC">Seleciona a UC</option>
                                    <option value="TI2">Tecnologias da Internet II</option>
                                    <option value="ED">Estatistica Descritiva</option>
                                    <option value="MAT2">Matematica II</option>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputData" class="col-sm-3 col-form-label">Data: </label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="inputData" placeholder="Data">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="inputHora" class="col-sm-3 col-form-label">Hora: </label>
                            <div class="col-sm-6">
                                <input type="time" class="form-control" id="inputHora" placeholder="Hora" step="1800">
                            </div>
                        </div>
            
                    </div>
                    <div class="col-md-4">
                        <div class="offset-sm-0">
                            <div class="form-group row">
                                <textarea class="form-control" id="Sumario" >Teste. Isto é um sumario</textarea ><br>
                                <button type="submit" class="btn btn-primary" onclick="submitSum()">Submeter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    
    
</body>
</html>