<?php
  include_once('snippets/head.php');
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
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <b><p style="text-align: center;">ID de Login:</p></b>
        </div>
        <div class="col-md-1">
            <p style="text-align: center;" ><input type="text"> </p>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <b><p style="text-align: center;">Password:</p></b>
        </div>
        <div class="col-md-1">
            <p style="text-align: center;" ><input type="password"> </p>
        </div>
        <div class="col-md-5"></div>
    </div>

        <div class="col-md-5"></div>
    </div>


    <div class="container-fluid">
        <p style="text-align: center;"><button onclick="login()">Login</button></p>
    </div>
                
</body>
</html>
