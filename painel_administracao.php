<?php
  include_once('snippets/head.php');
  include_once('snippets/startDB.php');
  include_once('snippets/SessionAdmin.php');
  

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="JS/javascript_admin.js" ></script>  
    <style >
    body {
    overflow-y: hidden;
    overflow-x: hidden;
    background-image: url("images/white.jpg");
    background-size: 90%;
   
  } </style>
    <title>Login Administração</title>
</head>
<body> 
    <div class="row">
        <div class="col-md-1">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-Turmas-tab" data-toggle="pill" href="#v-pills-Turmas" role="tab" aria-controls="v-pills-messages" aria-selected="false">Turmas</a>
                <a class="nav-link" id="v-pills-login-tab" data-toggle="pill" href="#v-pills-login" role="tab" aria-controls="v-pills-settings" aria-selected="false">Codigos de login</a>
                <a class="nav-link" id="v-pills-sumarios-tab" data-toggle="pill" href="#v-pills-sumarios" role="tab" aria-controls="v-pills-settings" aria-selected="false">Sumarios</a>
                <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-settings" aria-selected="false">Utilizadores</a>
                <a class="nav-link" id="v-pills-ucs-tab" data-toggle="pill" href="#v-pills-ucs" role="tab" aria-controls="v-pills-settings" aria-selected="false">Unidades Curriculares</a>
                <a class="nav-link" id="v-pills-ucs-tab" href="logoutAdmin.php" role="tab" aria-controls="v-pills-settings" aria-selected="false">Sair</a>
            </div>
        </div>
        <div class="col-md-11">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade offset-md-1 show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><?php include_once('home_admin.php');?></div>
                <div class="tab-pane fade offset-md-1" id="v-pills-Turmas" role="tabpanel" aria-labelledby="v-pills-Turmas-tab"><?php include_once('admin/turma.php');?></div>
                <div class="tab-pane fade offset-md-1" id="v-pills-login" role="tabpanel" aria-labelledby="v-pills-login-tab"><?php include_once('admin/codigos_login.php');?></div>
                <div class="tab-pane fade offset-md-1" id="v-pills-sumarios" role="tabpanel" aria-labelledby="v-pills-sumarios-tab"><?php include_once('admin/ucsumario.php');?></div>
                <div class="tab-pane fade offset-md-1" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab"><?php include_once('admin/lista_users.php');?></div>
                <div class="tab-pane fade offset-md-1" id="v-pills-ucs" role="tabpanel" aria-labelledby="v-pills-ucs-tab"><?php include_once('admin/UC.php');?> </div>

            </div>
        </div>
    </div>
    
</body>
</html>