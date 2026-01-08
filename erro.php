<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro - Registro Não Localizado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            color: #b71c1c; /* Vermelho escuro para alerta */
            margin-bottom: 20px;
        }

        p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .btn-primary {
            padding: 12px 20px;
            background-color: #388e3c;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #2e7d32;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Registro Não Localizado!</h1>
    <p>O CPF informado não possui diplomas registrados ou a consulta não retornou resultados.</p>
    <a href="consultapublica.php" class="btn-primary">Voltar</a>
</div>

</body>
</html>
