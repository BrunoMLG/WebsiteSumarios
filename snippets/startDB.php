<?php
    $dbh = new PDO('mysql:host=localhost;dbname=websitesumarios','root', '');
    if (!$dbh){
        echo 'não acedeu à base de dados com sucesso!';
        die();
    }
?>