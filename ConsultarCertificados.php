<?php

//require 'top.php';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAEV-Consulta de Certificados</title>
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

        .container h1 {
            color: #006400;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #388e3c;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #2e7d32;
        }

        .message-info {
            font-size: 12px;
            color: #555;
            margin-top: 15px;
        }

        .message-info a {
            color: #388e3c;
            text-decoration: none;
        }

        .message-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Consulta de Certificados</h1>
    <p>Informe o CPF que deseja consultar</p>    
    <form method="GET" action="certiificadospublica.php">
        <input type="text" class="form-control" id="dados" name="termo" placeholder="000.000.000-00" required>
        <button type="submit" class="btn-primary">Consultar</button>
    </form>
    <p class="message-info">
        ⚠️ Atenção: Esta ferramenta está em atualização. Se a consulta não retornar os dados, contate: <a href="mailto:diplomas@faculdademogiana.edu.br">cerficados@faculdademogiana.edu.br</a><br/><a href="mailto:diplomas@faev.edu.br">certificados@faev.edu.br</a>
    </p>
</div>

<!-- IMask JS -->
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(document.getElementById('dados'), {
      mask: '000.000.000-00'
    });
</script>

</body>
</html>

