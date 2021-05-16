<?php
  include_once('snippets/head.php');
 
//  include_once('snippets/register.php');
?>
<?php
session_start();
echo "teste";
echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
// initializing variables
$username = "";
$email    = "";
$errors = array(); 


$dbh = new PDO('mysql:host=localhost;dbname=websitesumariosteste','root', '');
if (!$dbh){
    echo 'não acedeu à base de dados com sucesso!';
    die();}



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['inputNome']);
  $email = mysqli_real_escape_string($db, $_POST['inputEmail']);
  $password = mysqli_real_escape_string($db, $_POST['inputPW']);
  $password_C = mysqli_real_escape_string($db, $_POST['inputCPW']);
  echo '<script language="javascript">';
  echo 'alert("message successfully sent")';
  echo '</script>';
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
//   if (empty($username)) { array_push($errors, "Username is required"); }
//   if (empty($email)) { array_push($errors, "Email is required"); }
//   if (empty($password)) { array_push($errors, "Password is required"); }
//   if ($password != $password_C) {
// 	array_push($errors, "The two passwords do not match");
//   }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
//   $user_check_query = "SELECT * FROM Aluno WHERE nome='$username' OR email='$email' LIMIT 1";
//   $result = mysqli_query($db, $user_check_query);
//   $user = mysqli_fetch_assoc($result);
  
//   if ($user) { // if user exists
//     if ($user['username'] === $username) {
//       array_push($errors, "Username already exists");
//     }

//     if ($user['email'] === $email) {
//       array_push($errors, "email already exists");
//     }
//   }

  // Finally, register user if there are no errors in the form
//   if (count($errors) == 0) {
//   	$password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO Aluno (id_aluno, nome, email, password) 
        VALUES('NULL', '$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
        // header('location: index.php');
echo "log feito";
    // } 
        
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registar</title>
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
        <h1 style="text-align: center; font-size: 80px">Registar</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <form>
                <div class="form-group row">
                    <label for="inputID" class="col-sm-3 col-form-label">Nome de Utilizador:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputID" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="inputPW" class="col-sm-3 col-form-label">Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPW" placeholder="Password">
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="inputPW" class="col-sm-3 col-form-label">Confirmar password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputCPW" placeholder="Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPerfil" class="col-sm-3 col-form-label">Perfil:</label>
                    <div class="col-sm-9">
                    <select name="perf" id="perf"class="col-sm-9 form-control">
                        <option value="aluno" id="aluno">Aluno</option>
                        <option value="professor" id="professor">Professor</option>
                    </select>
                    </div>
                </div>

                <div style="text-align: right;" class="col-sm-8">
                    <br><button type="submit" class="btn btn-primary" name="reg_user"id="reg_user">Registar</button></div>
                </div>
                <button type="submit" class="btn" name="reg_user">Register</butt
            </form>  <!--botões deverãopassar para dentro do form--> 
                <div class="form-group row">
                    <div class="col-sm-4">
                    
                    <br><a class="btn btn-primary" href="login.php" >Ja registado?</div></a>
                        <!-- <br><a href="registar.php" class="btn btn-primary">Registar</a> -->
                    <div style="text-align: right;" class="col-sm-8">
                    <!-- <br><button type="submit" class="btn btn-primary"  >Registar</button></div> -->
                    </div>
                    
        </div>
    </div>
</body>
</html>