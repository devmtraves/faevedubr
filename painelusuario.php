<?php
session_start();
if(empty($_SESSION['id'])){
    header('location:login.hmtl');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <style>
    body {
        margin: 0;
        font-family: 'Montserrat', Arial, sans-serif;
        background-color: #f7faff;
    }

    .nav {
        background: #232946;
        height: 56px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 0 36px;
    }

    .nav a img {
        width: 32px;
        filter: invert(1);
        transition: opacity 0.2s;
    }

    .nav a:hover img {
        opacity: 0.7;
    }

    .menuAdm {
        position: fixed;
        top: 0;
        left: 0;
        width: 220px;
        height: 100%;
        background: linear-gradient(180deg, #232946 70%, #395886 100%);
        box-shadow: 2px 0 18px rgba(0, 0, 0, 0.10);
        padding-top: 64px;
        z-index: 100;
    }

    .menuAdm ul {
        list-style: none;
        padding: 0 0 0 0;
        margin: 0;
    }

    .menuAdm ul li {
        margin-bottom: 24px;
    }

    .menuAdm ul li a {
        color: #ecedf6;
        display: block;
        text-decoration: none;
        font-size: 1.08em;
        padding: 15px 25px;
        border-radius: 0 20px 20px 0;
        transition: background 0.2s, color 0.2s;
        font-weight: 500;
        letter-spacing: 0.01em;
    }

    .menuAdm ul li a:hover {
        background: #eebbc3;
        color: #232946;
    }

    .conteudo {
        margin-left: 230px;
        padding: 40px 30px 24px 30px;
        max-width: 900px;
    }

    h1 {
        font-size: 2.1em;
        color: #232946;
        font-weight: 700;
        margin-bottom: 8px;
    }

    h5.text-success {
        margin-bottom: 36px;
        color: #00bab1;
        font-size: 1.10em;
        font-weight: 500;
    }

    h2 {
        font-size: 1.13em;
        margin-top: 32px;
        font-weight: 700;
        color: #1abc9c;
    }

    p {
        color: #21243d;
        font-size: 1.05em;
        line-height: 1.66;
        margin-bottom: 8px;
    }

    @media (max-width: 800px) {
        .menuAdm {
            width: 70vw;
        }

        .conteudo {
            margin-left: 72vw;
            padding: 16px 10px;
        }
    }

    @media (max-width: 520px) {
        .nav {
            padding: 0 12px;
        }

        .menuAdm {
            position: static;
            width: 100vw;
            padding-top: 16px;
            height: auto;
            box-shadow: none;
        }

        .conteudo {
            margin-left: 0;
            padding: 15px 5vw;
        }

        @media (max-width: 800px) {
            footer {
                margin-left: 70vw !important;
                width: calc(100% - 70vw) !important;
            }
        }

        @media (max-width: 520px) {
            footer {
                margin-left: 0 !important;
                width: 100vw !important;
                font-size: 0.97em;
                position: static !important;
                padding: 12px 2vw !important;
            }
        }

    }
    </style>
</head>

<body>

    <div class="nav justify-content-end p-3" style="background-color:#222; border-bottom:2px solid #444;">
        <a href="sair.php" class="btn"
            style="background-color:#dc3545; color:#fff; font-weight:600; border:none; border-radius:30px; padding:8px 18px; transition:0.3s;">
            Sair
        </a>
    </div>

    <style>
    a.btn:hover {
        background-color: #bb2d3b !important;
        transform: scale(1.05);
    }
    </style>
    <div class="menuAdm">
        <ul>
            <li><a href="cadastrardiplomasecretaria.php" target="_self">Cadastrar Diploma</a></li>
            <!-- <li><a href="cadastrarcertificado.php" target="_self">Cadastro de Certificados</a></li>
            <li><a href="listar-certificados.php" target="_self">Consultar Certificados</a></li>-->
            <!--  -->
            <li><a href="listardiplomas.php" target="_self">Consultar Diploma</a></li>
            <li><a href="diplomas-cadastrados.php" target="_self">Atualizar Diploma</a></li>

    </div>
    <div class="conteudo">
        <h1>Painel Administrativo</h1>
        <h5 class="text-success text-capitalize">Olá, <?php echo $_SESSION['nomeuser']; ?> </h5>
        <h2>📜 Cadastrar Diploma</h2>
        <p>Nesta seção, é possível registrar novos diplomas no sistema, informando dados como nome do aluno, curso, data
            de conclusão e número de registro.</p>
        <!-- Removido só liberar pós Ajustes Certiicados
            <h2>📜 Cadastrar Certificados de Conclusão de Curso de Extensaões e Pós Graduação</h2>
        <p>Nesta seção, é possível registrar novos certificados no sistema, informando dados como nome do aluno, curso,
            data
            de conclusão .</p>-->
        <h2>🔍 Consultar Diploma</h2>
        <p>Permite pesquisar e visualizar diplomas já cadastrados. É possível realizar buscas por nome do aluno, número
            do diploma ou curso.</p>
        <h2>👤 Cadastrar Usuário</h2>
        <p>Aqui você pode adicionar novos usuários que terão acesso ao sistema, definindo informações como nome, e-mail,
            perfil de acesso e senha inicial.</p>
        <h2>📋 Consultar Usuários</h2>
        <p>Exibe a lista de todos os usuários cadastrados, permitindo editar informações, redefinir senhas ou excluir
            contas, conforme necessário.</p>
        <p>Utilize o menu lateral para navegar rapidamente entre as funcionalidades e agilizar sua rotina.</p>
    </div>
    <footer style="
    margin-left: 230px;
    background: #232946;
    color: #ecedf6;
    padding: 16px 0 14px 0;
    text-align: center;
    font-size: 1em;
    font-family: 'Montserrat', Arial, sans-serif;
    position: fixed;
    bottom: 0;
    left: 0;
    width: calc(100% - 230px);
    z-index: 100;">
        <span>AcadSytem - 2025</span>
    </footer>

</body>

</html>