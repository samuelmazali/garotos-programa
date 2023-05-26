<?php 
session_start();

include_once("conexao.php");
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$result_usuario = "INSERT INTO usuarios(nome, email, created) values('$nome', '$email', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    Cadastrado com sucesso
  </div>";
  header("location: cadastrocliente.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Erro ao cadastrar
  </div>";}
  header("location: cadastrocliente.php");
?>