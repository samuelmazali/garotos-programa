<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Adicione aqui seus estilos personalizados */
        body {
            font-family: Arial, sans-serif;
        }

        .main_menu {
            background-color: #f8f9fa;
        }

        .main_menu .navbar-brand img {
            width: 116px;
            height: 23px;
        }

        .main_menu .navbar-nav .nav-item .nav-link {
            color: #212529;
            font-weight: 500;
        }

        .main_menu .navbar-nav .nav-item .nav-link:hover {
            color: #007bff;
        }

        /* Adicione mais estilos conforme necessário */

        .title {
            text-align: center;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .btn-editar,
        .btn-excluir {
            background-color: transparent;
            border: none;
        }

        .btn-editar img,
        .btn-excluir img {
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
<header class="main_menu home_menu">
    <!-- Código do cabeçalho omitido por brevidade -->
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="title">Email Cadastrados</h1>
            <?php if (isset($_SESSION['msg'])) 
                echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
            
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
                        <td>
                            <button id="btn-editar<?php echo $row_usuario['id'] ?>" class="btn-editar" onclick="editar(<?php echo $row_usuario['id']; ?>)">
                                <img src="img/edit.png" alt="Editar">
                            </button>
                            <button id="btn-salvar<?php echo $row_usuario['id'] ?>" class="btn-editar" style="display:none;" onclick="salvar(<?php echo $row_usuario['id']; ?>)">
                                <img src="img/save.png" alt="Salvar">
                            </button>
                        </td>
                        <td>
                            <button id="btn-excluir<?php echo $row_usuario['id'] ?>" class="btn-excluir" onclick="excluir(<?php echo $row_usuario['id']; ?>)">
                                <img src="img/excluir.png" alt="Excluir">
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Código JavaScript omitido por brevidade
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
