<?php
  include_once('snippets/head.php');
  
  include('snippets/startDB.php');

session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: lista_disc_alunos.php");
    exit;
}

 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Insira o Email!";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        
        $password_err = "Insira a Password!";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, nome, password, email ,tipo FROM aluno WHERE email = ? UNION SELECT id, nome, password, email, tipo FROM professor WHERE email = ?";
        
        if($stmt = $dbh->prepare($sql)){
            // Bind variables to the prepared statement as parameters
             $email = $_POST['email'];
            //$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            //$param_username = trim($_POST["nome"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute(array($email, $email))){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $tipo = $row["tipo"];
                        $username = $row["nome"];
                        $hashed_password = $row["password"];
                        $password = md5($password);
                        if($password == $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["nome"] = $username;   
                            $_SESSION["tipo"] = $tipo;                        
                            
                            // Redirect user to welcome page
                            header("location: lista_disc_alunos.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Password ou nome errados.";
                            
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                   
                    $login_err = "Password ou nome Invalidos.";
                }
            } else{
                echo "Erro! Tente novamente mais tarde.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($dbh);
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<script src="JS/javasript.js" ></script> 
    <title>Login Alunos</title>
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
        <h1 style="text-align: center; font-size: 80px">Login</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 offset-md-4">
        <?php 
        if(!empty($login_err)){
            echo '<script> alert("'.$login_err .'"); </script> ';
           
            //echo '<div class="alert alert-danger">' . $login_err . '</div> <script> alert("'.$login_err .'"); </script> ';
        }    
        
        ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" placeholder="Password:">
                    </div>
                </div><br>

                <div class="form-group row">
                    <div class="col-sm-3">
                    <br><a class="btn btn-primary"  values="registar" href="registar.php">Registar</a></div>


                    <div style="text-align: right;" class="col-sm-9">
                        <br><button type="submit" class="btn btn-primary"  Values="login" id="login">Login</button></div>
                    </div>
                
                 </form>  
                
                    
        </div>
    </div>
</body>
</html>
