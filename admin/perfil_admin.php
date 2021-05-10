<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil</title>
</head>
<body>

    <div class="col-md-11">
        <h1 style="text-align: center; font-size: 80px">Perfil</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2"><img style="height: 170px;" src="images\default_user.jpg"><br><br>
                    <button type="submit" class="btn btn-primary" style="font-size:10px;">Alterar Fotografia</button>
                    <button type="submit" class="btn btn-primary" style="font-size:10px;">Alterar Password</button> <br><br>
                    <button type="submit" class="btn btn-primary" style="font-size:10px;">Horario</button>
                </div>
            
        
        <div class="col-md-7 ">

            <form>
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="nome" class="form-control" id="inputNome" placeholder="Nome">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputTelemovel" class="col-sm-2 col-form-label">Telemovel</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputTelemovel" placeholder="Telemovel">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputMorada" class="col-sm-2 col-form-label">Morada</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputMorada" placeholder="Morada">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPerfil" class="col-sm-2 col-form-label">Perfil</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPerfil" placeholder="Perfil" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <br><button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>