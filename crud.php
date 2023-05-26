<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Cadastre seu email</h1>
    <?php if (isset($_SESSION['msg'])) 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
     ?>
     <form action="processa.php" method="post">
     <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nome</label>
    <input type="text" class="form-control" name="nome" id="nome">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email">
    </div>
    <input type="submit" class="btn btn-success" value="Cadastrar">
     </form>
     <br>
     <hr>
     <br>
     <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Data de criação</th>
      <th scope="col" id="treditar">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
     <?php 
     require_once("conexao.php");

     $result_usuario = "SELECT * FROM usuarios";
     $resultado_usuario = mysqli_query($conn, $result_usuario);

     while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
    ?>
    <tr>
        <td><?php echo "<p id='nome-mudar".$row_usuario['id']."'>".$row_usuario['nome']."</p>";?></td>
        <td><?php echo "<p id='email-mudar".$row_usuario['id']."'>".$row_usuario['email']."</p>";?></td>
        <td><?php echo $row_usuario['created'];?></td>
        <td><button id="btn-editar<?php echo $row_usuario['id'] ?>" style="background-color: transparent; border: none;" onclick="editar(<?php echo $row_usuario['id']; ?>)"><img src="img/edit.png" width="40" height="40"></button>
        <button id="btn-salvar<?php echo $row_usuario['id'] ?>" style="background-color: transparent; border: none; display:none;" onclick="salvar(<?php echo $row_usuario['id']; ?>)"><img src="img/save.png" width="40" height="40"></button></td>
        <td><button id="btn-excluir<?php echo $row_usuario['id'] ?>" style="background-color: transparent; border: none;" onclick="excluir(<?php echo $row_usuario['id']; ?>)"><img src="img/excluir.png" width="40" height="40"></button></td>
    </tr>
    <?php
     }
     ?>
     </tbody>
</table>
<script>
    function editar(id){
        var nome = document.getElementById('nome-mudar' + id)
        var email = document.getElementById('email-mudar' + id)

        nome.innerHTML = "<input type='text' id='nome-text"+ id +"' value='"+nome.innerHTML.trim()+"'>"
        email.innerHTML = "<input type='email' id='email-text"+ id +"' value='"+email.innerHTML.trim()+"'>"

        document.getElementById('btn-editar' + id).style.display = "none"
        document.getElementById('btn-salvar' + id).style.display = "block"
        document.getElementById('treditar').innerText = "Salvar"

    }

    async function salvar(id){
        console.log(id)
        var nome_val = document.getElementById('nome-text' + id).value
        var email_val = document.getElementById('email-text' + id).value

        document.getElementById('nome-mudar' + id).innerHTML = nome_val
        document.getElementById('email-mudar' + id).innerHTML = email_val

        var dadosForm = "id=" + id + "&nome=" + nome_val + "&email=" + email_val

        const dados = await fetch("./editar.php", {
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: dadosForm
    });

        document.getElementById('btn-editar' + id).style.display = "block"
        document.getElementById('btn-salvar' + id).style.display = "none"
        setTimeout(function() {
   window.location.reload(1);
 }, 100);
    }

    async function excluir(id){
        var dadosForm = "id=" + id;

const dados = await fetch("excluir.php", {
    method: "POST",
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: dadosForm
});
setTimeout(function() {
   window.location.reload(1);
 }, 100);
    }
</script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>