<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAEV-Cadastro de Diplomas</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg,  #FFFFFF, #1b8d05);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .form-container h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    .form-group label {
      display: block;
      font-size: 14px;
      margin-bottom: 6px;
      color: #555;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 14px;
      transition: 0.3s;
    }

    .form-group input:focus {
      border-color: #2575fc;
      outline: none;
      box-shadow: 0 0 6px rgba(37,117,252,0.5);
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      background: #45d358;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #1a5bcc;
    }

    .footer {
      margin-top: 15px;
      font-size: 13px;
      color: #666;
    }

    .footer a {
      color: #2575fc;
      text-decoration: none;
    }
  </style>
</head>
<body>
  
  <div class="form-container">
     <div class="container my-5">
  <div class="card shadow-lg p-4 mx-auto" style="max-width: 700px; border-radius: 15px; background: #f8f9fa;">
    
    <div class="text-center mb-4">
      <h2 class="fw-bold text-primary">Bem-vindo ao ACAD-SYSTEM</h2>
      <p class="text-muted fs-5">
        Portal para verificação de <strong>diplomas registrados oficialmente</strong> no <strong>Diário Oficial da União</strong>.
      </p>
    </div>

    <div class="mb-3 text-center">
      <p class="text-secondary fs-6">
        O acesso é <strong>restrito e seguro</strong> para preservar a confidencialidade e autenticidade dos dados.
      </p>
    </div>

    <div class="mb-4 text-center">
      <p class="fs-6">
        Insira seu <strong>usuário</strong> e <strong>senha</strong> para acessar as opções de consulta.
      </p>
    </div>
    <h2>FAEV</h2>
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="login" name="login" placeholder="Digite seu e-mail" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
      </div>
      <button type="submit">Acessar</button>
    </form>
    
  </div>
</body>
</html>
