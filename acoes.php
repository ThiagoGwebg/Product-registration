<?php
session_start();
require 'conexao.php';

if (isset($_POST['create-nome'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $descrição = mysqli_real_escape_string($conexao, trim($_POST['descrição']));
    $preço = mysqli_real_escape_string($conexao, trim($_POST['preço']));

    $sql = "INSERT INTO produtos (nome, descrição, preço) VALUES ('$nome', '$descrição', '$preço')";



    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        header('Location: index.php');
        exit;
    } else {
        header('Location: index.php');
        exit;
    }

}
;

if (isset($_POST['delete_produto'])) {
    $produto_id = mysqli_real_escape_string($conexao, $_POST['delete_produto']);
    $sql = "DELETE FROM produtos WHERE id = '$produto_id'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        header('Location: index.php');
        exit;
    } else {
        header('Location: index.php');
        exit;
    }
}
;


?>