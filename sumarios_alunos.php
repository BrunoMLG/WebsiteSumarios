<?php
  include_once('snippets/head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sumarios Alunos</title>
</head>
<body>
	<?php
	  include_once('snippets/menu_aluno.php');
	?>
		
      <div class="container-fluid">
        <h1 style="text-align: center; font-size: 80px">Sumarios</h1>
    </div>
<br>
    <div class="row">
        <div class="col-md-7">

            <form>
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
                        <input type="time" class="form-control" id="inputHora" placeholder="Hora">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-3">
                        <br><button type="submit" class="btn btn-primary">Pesquisar</button><br><br>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="offset-sm-0">

                <textarea class="form-control" id="sumario" readonly>Teste. Isto é um sumario</textarea ><br>

                <form>
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
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>