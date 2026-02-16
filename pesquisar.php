<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta Pública</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8, #e2f0e9);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-box {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .card-box h1 {
            color: #2e7d32;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .card-box p {
            color: #555;
            margin-bottom: 30px;
        }

        .btn-modern {
            transition: all 0.3s ease;
            font-size: 18px;
            padding: 12px;
        }

        .btn-modern:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .alert-custom {
            margin-top: 25px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="card-box">

        <h1>Consulta Pública</h1>
        <p>Escolha uma das opções abaixo para iniciar sua pesquisa</p>

        <div class="d-flex flex-column gap-3">

            <a href="consultapublica.php"
               class="btn btn-success btn-modern rounded-pill">
                📘 Pesquisar Diplomas
            </a>

            <a href="ConsultarCertificados.php"
               class="btn btn-danger btn-modern rounded-pill">
                📜 Pesquisar Certificados
            </a>

        </div>

        <div class="alert alert-warning alert-custom mt-4">
            ⚠️ Esta ferramenta está em atualização.  
            Caso a consulta não retorne dados, entre em contato:  
            <strong>diplomas@faev.edu.br</strong>
        </div>

    </div>

</body>
</html>
