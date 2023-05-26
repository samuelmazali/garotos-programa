<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO usuarios (nome, email, cpf, created) values('$nome', '$email', '$cpf', NOW())";
$resultado_usuario = mysqli_query($mysqli, $result_usuario);

if(mysqli_insert_id($mysqli)) {
    $SESSION['msg'] = "<p style= 'color:green;'>Usuario Cadastrado com Sucesso</p>";
    header("Location:cadastrocliente.php");
}
else {
    header("Location: cadastro-cliente.php");
}