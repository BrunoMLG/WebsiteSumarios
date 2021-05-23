<?php
// Inicia a sessao
session_start();
 
$_SESSION = array();
 
// Acaba a sessao
session_destroy();
 
// Redireciona para a pagina de login
header("location: login_administracao.php");
exit;
?>