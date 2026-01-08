<?php
session_start();
require 'topoadm.php';

if (empty($_SESSION['id'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISDIPLOMA - Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f8fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-form {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        h5 {
            background-color: #2575fc;
            color: #fff;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-submit {
            width: 50%;
            display: block;
            margin: 20px auto 0;
            padding: 10px;
            font-size: 1rem;
            border-radius: 50px;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: #1a5edb;
        }

        .voltar img {
            transition: 0.3s;
        }

        .voltar img:hover {
            transform: scale(1.1);
        }

        @media(max-width: 768px) {
            .btn-submit {
                width: 80%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card-form">
        <form class="row g-3" action="usuario.php" method="POST">
            <h5>Cadastrar Novo Usuário</h5>

            <div class="col-md-3">
                <label class="form-label fw-bold">CPF</label>
                <input type="text" class="form-control" name="cpf" placeholder="Digite o CPF do Usuário" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Nome</label>
                <input type="text" class="form-control" name="nomeusuario" placeholder="Nome do Usuário" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail do Usuário" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Departamento</label>
                <select name="departamento" class="form-select" required>
                    <option selected disabled>Selecione o Departamento</option>
                    <option value="Acadêmico">Acadêmico</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Secretaria">Secretaria</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Ativar Usuário?</label>
                <select name="status" class="form-select" required>
                    <option selected disabled>Selecione</option>
                    <option value="1">Sim</option>
                    <option value="2">Não</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Perfil</label>
                <select name="perfil" class="form-select" required>
                    <option selected disabled>Tipo de Perfil</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuário</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Senha" required>
            </div>

            <input type="submit" class="btn btn-primary btn-submit" value="Cadastrar">

            <div class="d-flex justify-content-end mt-4">
        <a href="paineladm.php" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    
    </div>

        </form>
    </div>
</div>

</body>
</html>
