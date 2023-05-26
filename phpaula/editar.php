<?php
$pdo = new PDO('mysql:host=localhost;dbname=clientes-aula','root','');

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$sql = $pdo->prepare("UPDATE usuarios SET nome = :a , email  = :b WHERE id = :i");  
      $sql->bindvalue(":a", $dados['nome']);
      $sql->bindvalue(":b", $dados['email']);
      $sql->bindvalue(":i", $dados['id']);
      $sql->execute();
 ?> 