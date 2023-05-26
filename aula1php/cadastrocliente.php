<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro </title>
    <meta charset="uft-8"/>
    <link rel="stylesheet" type="text/css" href="#">
</head>
<body>
    <h1>Cadastre seu Email</h1>
    <?php
    if(isset($_SESSION['MSG']))
    echo $_SESSION['msg'];
    unset($_SESSION['MSG']);
?>
<form class="formulario" method="post" action="processa.php">
    <div class="field">
        <label for="nome"> Nome</label>
        <input type="text" id="nome" name="nome" placeholder="digite seu nome" required>
    </div>
<div class="field">
    <label for="email"> Seu Email:</label>
    <input type="email" id="email" name="email" placeholder="Digite seu Email" required>
</div>
<div class="field">
        <label for="cpf">CPF</label>
        <input type="text" id="nome" name="cpf" placeholder="digite seu CPF" required>
    </div>
<input type="submit" name="acao" value="Cadastrar">
</fotm>
</body>
</html>