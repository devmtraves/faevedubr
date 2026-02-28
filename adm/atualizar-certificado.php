<?php
//require 'top.php';

require 'funcsistema.php';


//Recebendo o registro para pesquisar registro do certificado

//$doc_Aluno = $_GET['id'];

//var_dump($_GET);
$doc_Aluno = $_GET['Registro'];



?>

<?php

$ListarRegistros = consultarCertificados($conexao, $doc_Aluno); // selecionar pelo id do certificado que foi clicado na página 

//var_dump($ListarRegistros);

if ($ListarRegistros == null) {

    echo "<div class='alert alert-warning' role='alert'>
    Registro Não Localizado!
  </div>";

    die;
}

?>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Certificado </title>
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
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        background: #fff;
        padding: 20px;
    }

    .card-section h4 {
        border-bottom: 2px solid #388e3c;
        ;
        padding-bottom: 8px;
        margin-bottom: 15px;
        color: #388e3c;
        ;
    }

    .form-control[readonly] {
        background-color: #e9f0fc;
        font-weight: 500;
        color: #333;
    }

    .input-group-text {
        background: #388e3c;
        ;
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
    <div class="form">
        <form class="row g-3" action="update_certificado.php" method="POST">
            <div class="container">
                <h1>Atualização das informações do certificado </h1>
                <!-- Aluno -->
                <div class="card-section">
                    <h4><i class="fa-solid fa-user"></i> Informações do Aluno</h4>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-bold">Nome</label>
                            <input type="text" class="form-control" name="Nome"
                                value="<?php echo $ListarRegistros[0]['Nome']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">CPF</label>
                            <input type="text" class="form-control" name="doc"
                                value="<?php echo $ListarRegistros[0]['doc']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!--Campo Hidden-->
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold "></label>
                    <input class="form-control form-control-sm" type="hidden" class="form-control"
                        id="formGroupExampleInput" name="id" value="<?php echo $ListarRegistros[0]['Registro']; ?> "
                        readonly>
                </div>

                <!-- Curso -->
                <div class="card-section">
                    <h4><i class="fa-solid fa-graduation-cap"></i> Informações do Curso</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tipo do Curso</label>
                            <input type="text" class="form-control" name="TipoCurso"
                                value="<?php echo $ListarRegistros[0]['TipoCurso']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Curso</label>
                            <input type="text" class="form-control" name="Curso"
                                value="<?php echo $ListarRegistros[0]['Curso']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Carga Horária</label>
                            <input type="text" class="form-control" name="Ch"
                                value="<?php echo $ListarRegistros[0]['Ch']; ?>" required>
                        </div>


                    </div>
                </div>

                <!-- Diploma -->
                <div class="card-section">
                    <h4><i class="fa-solid fa-file-lines"></i> Informações do Certificado</h4>

                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Data de Início</label>
                            <input type="text" class="form-control date" name="DataDeInicio"
                                value="<?php echo !empty($ListarRegistros[0]['DataDeInicio']) ? date('d/m/Y', strtotime($ListarRegistros[0]['DataDeInicio'])) : ''; ?>"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Data de Conclusão</label>
                            <input type="text" class="form-control date" name="DataDeConclusao"
                                value="<?php echo !empty($ListarRegistros[0]['DataDeConclusao']) ? date('d/m/Y', strtotime($ListarRegistros[0]['DataDeConclusao'])) : ''; ?>"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Data de Emissão</label>
                            <input type="text" class="form-control date" name="DataDeEmissao"
                                value="<?php echo !empty($ListarRegistros[0]['DataDeEmissao']) ? date('d/m/Y', strtotime($ListarRegistros[0]['DataDeEmissao'])) : ''; ?>"
                                required>
                        </div>

                        <div class="col-md-12">
                            <input class="btn btn-danger" type="submit" value="Atualizar">
                        </div>

                    </div>
                </div>

        </form>


</body>
<script src="https://unpkg.com/imask"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // CPF
    const cpfInput = document.getElementById('cpf');
    if (cpfInput) {
        IMask(cpfInput, {
            mask: '000.000.000-00'
        });
    }

    // Datas
    document.querySelectorAll('.date').forEach(function(input) {
        IMask(input, {
            mask: '00/00/0000'
        });
    });

});
</script>

</html>