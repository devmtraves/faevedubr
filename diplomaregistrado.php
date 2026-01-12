<?php
//require 'adm/funcsistema.php';
// Aqui foi removida a query da função do sistema global 
require 'adm/consultas.php';

$dadosAluno = $_GET['termo'];
$ListarRegistros = consultaRegistro($conexao, $dadosAluno);

if (empty($ListarRegistros)) { // verifica se é nulo, vazio ou falso
    // Redirecionar para a página de erro
    header("Location: erro.php");
    exit; // sempre colocar exit após header
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAEV - Consulta Diploma </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f4f8;
            min-height: 100vh;
            padding: 40px 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-section {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            background: #fff;
            padding: 20px;
        }

        .card-section h4 {
            border-bottom: 2px solid #388e3c;;
            padding-bottom: 8px;
            margin-bottom: 15px;
            color: #388e3c;;
        }

        .form-control[readonly] {
            background-color: #e9f0fc;
            font-weight: 500;
            color: #333;
        }

        .input-group-text {
            background: #388e3c;;
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

    <!-- Aluno -->
    <div class="card-section">
        <h4><i class="fa-solid fa-user"></i> Informações do Aluno</h4>
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label fw-bold">Nome</label>
                <input type="text" class="form-control" name="nomedoaluno" value="<?php echo $ListarRegistros[0]['nomedoaluno']; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">CPF</label>
                <input type="text" class="form-control" name="docaluno" value="<?php echo $ListarRegistros[0]['doc']; ?>" readonly>
            </div>
        </div>
    </div>

    <!-- Curso -->
    <div class="card-section">
        <h4><i class="fa-solid fa-graduation-cap"></i> Informações do Curso</h4>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Curso</label>
                <input type="text" class="form-control" name="curso" value="<?php echo $ListarRegistros[0]['curso']; ?>" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Código E-mec do Curso</label>
                <input type="text" class="form-control" name="emeccurso" value="<?php echo $ListarRegistros[0]['codigoemec']; ?>" readonly>
            </div>
            
            <div class="col-md-6">
                <label class="form-label fw-bold">Instituição Expedidora</label>
                <input type="text" class="form-control" name="facexp" value="<?php echo $ListarRegistros[0]['instexpedidora']; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold">Instituição Registradora</label>
                <input type="text" class="form-control" name="emecFexp" value="<?php echo $ListarRegistros[0]['instregistradora']; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold">Ingresso no Curso</label>
                <input type="text" class="form-control" name="iniciodocurso" value="<?php echo !empty($ListarRegistros[0]['ingressoCurso']) ? date('d/m/Y', strtotime($ListarRegistros[0]['ingressoCurso'])) : ''; ?>" readonly>
            </div>
            <div class="col-md-5">
                <label class="form-label fw-bold">Conclusão do Curso</label>
                <input type="text" class="form-control" name="conclusaodocurso" value="<?php echo !empty($ListarRegistros[0]['conclusaoCurso']) ? date('d/m/Y', strtotime($ListarRegistros[0]['conclusaoCurso'])) : ''; ?>" readonly>
            </div>
            <div class="col-md-5">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Data Expedição:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="conclusaodocurso"
                        
                        value="<?php echo date('d/m/Y',strtotime( $ListarRegistros[0]['dataExpedicao'])); ?>" readonly>
                </div>
            
        </div>
    </div>

    <!-- Diploma -->
    <div class="card-section">
        <h4><i class="fa-solid fa-file-lines"></i> Informações do Diploma</h4>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">Data de Registro</label>
                <input type="text" class="form-control" name="datadeexpedicao" value="<?php echo !empty($ListarRegistros[0]['dataregistroDiploma']) ? date('d/m/Y', strtotime($ListarRegistros[0]['dataregistroDiploma'])) : ''; ?>" readonly>
            </div>
            
            <div class="col-md-4">
                <label class="form-label fw-bold">Nº de Registro</label>
                <input type="text" class="form-control" name="numeroProcessoDiploma" value="<?php echo $ListarRegistros[0]['numeroProcesso']; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Data da Publicação no DOU</label>
                <input type="text" class="form-control" name="dataRegistroDou" value="<?php echo !empty($ListarRegistros[0]['dataRegistroDou']) ? date('d/m/Y', strtotime($ListarRegistros[0]['dataRegistroDou'])) : ''; ?>" readonly>
            </div>
        </div>
    </div>

    <!-- Botão centralizado -->
    <div class="btn-center">
        <a href="consultapublica.php" class="btn btn-success btn-lg"><i class="fa-solid fa-magnifying-glass"></i> Nova Consulta</a>
    </div>

</div>

</body>
</html>
