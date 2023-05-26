<?php
   $pdo = new PDO('mysql:host=localhost;dbname=clientes-aula','root','');

   $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

   if(!empty($dados['id'])){

$sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :i");
    $sql->bindvalue(":i", $dados['id']);
    $sql->execute();
}?>  