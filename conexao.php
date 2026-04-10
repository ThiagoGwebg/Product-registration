<?php

define('HOST', 'localhost:3307'); // Adicionamos a porta aqui!
define('USER', 'root');
define('PASS', 'Y2K@#43i');
define('DBNAME', 'atividade');

$conexao = mysqli_connect(HOST, USER, PASS, DBNAME);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}



?>