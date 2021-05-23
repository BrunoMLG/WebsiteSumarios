<?php
  include_once('snippets/head.php');
?>

<?php
  include('snippets/startDB.php');
 //include_once('snippets/SessionAdmin.php');
 session_id("admin");

 session_start();
 
// Verifica se o utilizador esta logado, se sim entao redireciona para a pagina principal
 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
     header("location: painel_administracao.php");
     exit;
 }


$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Verifica se o utilizador esta vazio
    if(empty(trim($_POST["nome"]))){
        $username_err = "Insira o Nome!";
    } else{
        $username = trim($_POST["nome"]);
    }
    
    // Verifica se a palavra-passe esta vazia
    if(empty(trim($_POST["password"]))){
        $password_err = "Insira a Password!";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Valida as credenciais
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id_admin, nome, password FROM admin WHERE nome = ?";
        
        if($stmt = $dbh->prepare($sql)){
             $username = $_POST['nome'];
            
            if($stmt->execute(array($username))){
                // Verifica se o utilizador existe, se sim entao verifica a palavra-passe
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id_admin"];
                        $username = $row["nome"];
                        $password = md5($password);
                        $hashed_password = $row["password"];
                        if($password== $hashed_password){
                            // Palavra-passe esta correta, entao começa nova sessao
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["nome"] = $username;                            
                            
                            // Redireciona utilizador a pagina principal
                            header("location: painel_administracao.php");
                        } else{
                            // Password não é valida, mostra uma mensagem de erro
                            $login_err = "Password ou nome errados.";
                        }
                    }
                } else{
                    // Utilizador não existe, mostra uma mensagem de erro
                    $login_err = "Password ou nome Invalidos.";
                }
            } else{
                echo "Erro! Tente novamente mais tarde.";
            }

            unset($stmt);
        }
    }
    
    unset($dbh);
    }


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <script src="JS/javascript_admin.js" ></script>    
    <title>Login Administração</title>
</head>
<body>

    
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="index.php"><img style="height: 40px; margin-left: 5%;" src="images/LogoPorto.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
            </ul>
        </div>
      </nav>


    <div class="container-fluid">
        <h1 style="text-align: center; font-size: 100px">Login</h1>
    </div>
<br>

<?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>


    <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-3 col-form-label">Nome:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nome" placeholder="Nome:">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                    </div><br>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" placeholder="Password" >
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                        </div><br>
                        <button type="submit" class="btn btn-primary" value="login" >Login</button>
                </form>
            </div>
    </div>     
</body>
</html>
