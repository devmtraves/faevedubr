<?php
session_start();
//require '../topoadm.php'; // deve definir $conexao
require 'funcsistema.php';

if (empty($_SESSION['id'])) {
    header('location:../login.php');
    exit;
}

// Verifica se o ID foi passado
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("<div class='alert alert-danger'>ID não informado!</div>");
}

$id_diploma = $_GET['id'];

// Chama os dados do registro para edição
$ListarRegistros = consultaRegistro($conexao, $id_diploma);

if (!$ListarRegistros) {
    die("<div class='alert alert-warning'>Registro não localizado!</div>");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAEV - Consulta Diploma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/imask"></script>
    <style>
    body {
        background: #f0f4f8;
        min-height: 100vh;
        padding: 40px 0;
        font-family: 'Segoe UI', sans-serif;
    }

    .card-section {
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        background: #fff;
        padding: 20px;
    }

    .card-section h4 {
        border-bottom: 2px solid #388e3c;
        padding-bottom: 8px;
        margin-bottom: 15px;
        color: #388e3c;
    }

    .form-control[readonly] {
        background-color: #e9f0fc;
        font-weight: 500;
        color: #333;
    }

    .input-group-text {
        background: #388e3c;
        color: #fff;
        border: none;
    }

    .btn-center {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    @media (max-width: 576px) {
        .input-group-text i {
            font-size: 14px;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <form class="row g-3" action="update-registrodiploma.php" method="POST">
            <!-- Aluno -->
             <input type="hidden" name="id_diploma" value="<?php echo $id_diploma; ?>">
            <div class="card-section">
                <h4><i class="fa-solid fa-user"></i> Informações do Aluno</h4>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label fw-bold">Nome</label>
                        <input type="text" class="form-control" name="nomedoaluno"
                            value="<?php echo $ListarRegistros[0]['nomedoaluno']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="doc"
                            value="<?php echo $ListarRegistros[0]['doc']; ?>">
                    </div>
                </div>
            </div>

            <!-- Curso -->
            <div class="card-section">
                <h4><i class="fa-solid fa-graduation-cap"></i> Informações do Curso</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Curso</label>
                        <input type="text" class="form-control" name="curso"
                            value="<?php echo $ListarRegistros[0]['curso']; ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Código E-mec do Curso</label>
                        <input type="text" class="form-control" name="codigoemec"
                            value="<?php echo $ListarRegistros[0]['codigoemec']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Instituição Expedidora</label>
                        <input type="text" class="form-control" name="instexpedidora"
                            value="<?php echo $ListarRegistros[0]['instexpedidora']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Instituição Registradora</label>
                        <input type="text" class="form-control" name="instregistradora"
                            value="<?php echo $ListarRegistros[0]['instregistradora']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Ingresso no Curso</label>
                        <input type="text" class="form-control date" name="ingressoCurso"
                            value="<?php echo !empty($ListarRegistros[0]['ingressoCurso']) ? date('d/m/Y', strtotime($ListarRegistros[0]['ingressoCurso'])) : ''; ?>">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-bold">Conclusão do Curso</label>
                        <input type="text" class="form-control date" name="conclusaoCurso"
                            value="<?php echo !empty($ListarRegistros[0]['conclusaoCurso']) ? date('d/m/Y', strtotime($ListarRegistros[0]['conclusaoCurso'])) : ''; ?>">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-bold">Data Expedição</label>
                        <input class="form-control date" type="text" name="dataExpedicao"
                            value="<?php echo !empty($ListarRegistros[0]['dataExpedicao']) ? date('d/m/Y', strtotime($ListarRegistros[0]['dataExpedicao'])) : ''; ?>">
                    </div>
                </div>
            </div>

            <!-- Diploma -->
            <div class="card-section">
                <h4><i class="fa-solid fa-file-lines"></i> Informações do Diploma</h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Data de Registro</label>
                        <input type="text" class="form-control date" name="dataregistroDiploma"
                            value="<?php echo !empty($ListarRegistros[0]['dataregistroDiploma']) ? date('d/m/Y', strtotime($ListarRegistros[0]['dataregistroDiploma'])) : ''; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Nº de Registro</label>
                        <input type="text" class="form-control" name="numeroProcesso"
                            value="<?php echo $ListarRegistros[0]['numeroProcesso']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Data da Publicação no DOU</label>
                        <input type="text" class="form-control date" name="dataRegistroDou"
                            value="<?php echo !empty($ListarRegistros[0]['dataRegistroDou']) ? date('d/m/Y', strtotime($ListarRegistros[0]['dataRegistroDou'])) : ''; ?>">
                    </div>
                </div>
            </div>

            <div class="btn-center">
                <input class="btn btn-danger " type="submit" value="Atualizar">
                
            </div>
        </form>
    </div>

    <script>
    // Máscara CPF
    IMask(document.getElementById('cpf'), {
        mask: '000.000.000-00'
    });

    // Máscara datas
    document.querySelectorAll('.date').forEach(function(input) {
        IMask(input, {
            mask: '00/00/0000'
        });
    });
    </script>
</body>

</html>