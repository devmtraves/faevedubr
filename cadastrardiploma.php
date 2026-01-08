<?php
session_start();


if (empty($_SESSION['id'])) {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faev - Consulta Diplomas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/imask"></script>
    <style>
    body {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-wrapper {
        background: #fff;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 100%;
    }

    .form-wrapper h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .btn-submit {
        width: 50%;
        margin: 0 auto;
        display: block;
        padding: 12px;
        font-size: 16px;
        border-radius: 12px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Cadastro de Diploma</h2>
            <h2>Digite as informações do Diploma do Aluno</h2>

            <form class="row g-3" action="adm/processa-cadastro-diploma.php" method="POST">

                <div class="col-md-6">
                    <label class="form-label fw-bold">Nome Completo</label>
                    <input class="form-control" type="text" name="nomedoaluno" placeholder="João da Silva" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">CPF</label>
                    <input class="form-control" type="text" id="cpf" name="doc" placeholder="000.000.000-00" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Nome do Curso</label>
                    <input class="form-control" type="text" name="curso" placeholder="Gestão de RH" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Código E-mec do Curso do Curso</label>
                    <input class="form-control" type="text" name="codigoemec" placeholder="12345" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Instituição Expedidora</label>
                    <input class="form-control" type="text" name="instexpedidora" placeholder="Nome da instituição"
                        required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Instituição Registradora</label>
                    <input class="form-control" type="text" name="instregistradora" placeholder="Nome da instituição"
                        required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Ingresso no Curso</label>
                    <input class="form-control date" type="text" name="ingressoCurso" placeholder="dd/mm/aaaa" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Conclusão do Curso</label>
                    <input class="form-control date" type="text" name="conclusaoCurso" placeholder="dd/mm/aaaa"
                        required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Data de Expedição</label>
                    <input class="form-control date" type="text" name="dataExpedicao" placeholder="dd/mm/aaaa" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Data de Registro</label>
                    <input class="form-control date" type="text" name="dataregistroDiploma" placeholder="dd/mm/aaaa"
                        required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Nº de Registro</label>
                    <input class="form-control" type="number" name="numeroProcesso" placeholder="Ex: 123456" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Data de Publicação DOU</label>
                    <input class="form-control date" type="text" name="dataRegistroDou" placeholder="dd/mm/aaaa"
                        required>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary btn-submit" type="submit">Cadastrar</button>
                </div>
               <div class="col-12">
        <a href="paineladm.php" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    </div>
            </form>
        </div>
    </div>

    <script>
    // Máscara para CPF
    IMask(document.getElementById('cpf'), {
        mask: '000.000.000-00'
    });

    // Máscara para datas
    document.querySelectorAll('.date').forEach(function(input) {
        IMask(input, {
            mask: '00/00/0000'
        });
    });
    </script>
</body>

</html>