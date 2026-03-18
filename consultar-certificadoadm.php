<?php
//require 'top.php';

require 'adm/funcsistema.php';


/*Recebendo o registro para pesquisar Cpf do Aluno*/

                $doc_Aluno = $_GET['id'];

 ?>

<?php

$ListarRegistros = consultarCertificados($conexao, $doc_Aluno);

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
    <title>Certificado</title>
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
                <input type="text" class="form-control" name="Nome" value="<?php echo $ListarRegistros[0]['Nome']; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">CPF</label>
                <input type="text" class="form-control" name="doc" value="<?php echo $ListarRegistros[0]['doc']; ?>" readonly>
            </div>
        </div>
    </div>

    <!-- Curso -->
    <div class="card-section">
        <h4><i class="fa-solid fa-graduation-cap"></i> Informações do Curso</h4>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">Tipo do Curso</label>
                <input type="text" class="form-control" name="TipoCurso" value="<?php echo $ListarRegistros[0]['TipoCurso']; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Curso</label>
                <input type="text" class="form-control" name="Curso" value="<?php echo $ListarRegistros[0]['Curso']; ?>" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Carga Horária</label>
                <input type="text" class="form-control" name="Ch" value="<?php echo $ListarRegistros[0]['Ch']; ?>" readonly>
        </div>
        </div>
    </div>

    <!-- Diploma -->
    <div class="card-section">
        <h4><i class="fa-solid fa-file-lines"></i> Informações do Certificado</h4>
        <div class="row g-3">
             <div class="col-md-2">
                <label class="form-label fw-bold">Data de Inicio</label>
                <input type="text" class="form-control" name="DataDeInicio" value="<?php echo !empty($ListarRegistros[0]['DataDeInicio']) ? date('d/m/Y', strtotime($ListarRegistros[0]['DataDeInicio'])) : ''; ?>" readonly>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Data de Término</label>
                <input type="text" class="form-control" name="DataDeConclusao" value="<?php echo !empty($ListarRegistros[0]['DataDeConclusao']) ? date('d/m/Y', strtotime($ListarRegistros[0]['DataDeConclusao'])) : ''; ?>" readonly>
            </div>
           
               <div class="col-md-2">
                <label class="form-label fw-bold">Livro</label>
                <input type="text" class="form-control" name="Livro" value="<?php echo $ListarRegistros[0]['Livro']; ?>" readonly>
             
    </div>
            <div class="col-md-2">
                <label class="form-label fw-bold">Folha</label>
                <input type="text" class="form-control" name="Folha" value="<?php echo $ListarRegistros[0]['Folha']; ?>" readonly>
            </div>
        
          
            <div class="col-md-2">
                <label class="form-label fw-bold">Número de Registro</label>
                <input type="text" class="form-control" name="registro" value="<?php echo $ListarRegistros[0]['Registro']; ?>" readonly>
            </div>
 <div class="col-md-2">
                <label class="form-label fw-bold">Data de Registro</label>
                <input type="text" class="form-control" name="DataDeEmissao" value="<?php echo !empty($ListarRegistros[0]['DataDeEmissao']) ? date('d/m/Y', strtotime($ListarRegistros[0]['DataDeEmissao'])) : ''; ?>" readonly>
            </div>
            
         
                <!--LIBERAR NA VERSÂO DO SISTEMA DEPOIS DA TELA ADMIN    
                <a href="adm/editar-diploma.php?id=<?= $ListarRegistros[0]['doc']; ?>" class="btn btn-outline-primary"
                    role="button" aria-pressed="true">Editar</a>
                <a href="adm/excluir-diploma.php?id=<?= $ListarRegistros[0]['doc']; ?>" class="btn btn-danger"
                    role="button" aria-pressed="true">Excluir Registro</a>-->
        </div>
    <!-- Botão centralizado 
    <div class="btn-center">
        <a href="consulta_publica.php" class="btn btn-success btn-lg"><i class="fa-solid fa-magnifying-glass"></i> Nova Consulta</a>
    </div>

</div>-->

</body>
</html>