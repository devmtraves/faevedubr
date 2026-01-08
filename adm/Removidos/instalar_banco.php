<?php
/**
 * SCRIPT DE INSTALAÇÃO AUTOMÁTICA DO BANCO DE DADOS
 * SISTEMA DE GESTÃO ACADÊMICA GENESIS
 * 
 * Este script cria automaticamente o banco de dados e as tabelas necessárias
 * Execute este arquivo uma única vez para configurar o banco
 */

// Configurações do banco de dados
$servidor = "localhost";
$usuario = "seu_usuario"; // Altere para seu usuário do banco
$senha = "sua_senha";     // Altere para sua senha do banco
$nome_banco = "genesis";

echo "<h2>Instalação do Sistema Genesis</h2>";
echo "<p>Iniciando processo de instalação...</p>";

try {
    // Conectar ao MySQL sem especificar banco
    $conexao = new mysqli($servidor, $usuario, $senha);
    
    if ($conexao->connect_error) {
        throw new Exception("Erro de conexão: " . $conexao->connect_error);
    }
    
    echo "<p>✓ Conexão com MySQL estabelecida</p>";
    
    // Definir charset
    $conexao->set_charset("utf8mb4");
    
    // Criar banco de dados
    $sql_criar_banco = "CREATE DATABASE IF NOT EXISTS $nome_banco CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    
    if ($conexao->query($sql_criar_banco) === TRUE) {
        echo "<p>✓ Banco de dados '$nome_banco' criado/verificado</p>";
    } else {
        throw new Exception("Erro ao criar banco: " . $conexao->error);
    }
    
    // Selecionar o banco
    $conexao->select_db($nome_banco);
    echo "<p>✓ Banco de dados selecionado</p>";
    
    // Criar tabela usuario
    $sql_usuario = "CREATE TABLE IF NOT EXISTS usuario (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cpf VARCHAR(14) NOT NULL UNIQUE COMMENT 'CPF do usuário',
        nome VARCHAR(255) NOT NULL COMMENT 'Nome completo do usuário',
        email VARCHAR(255) NOT NULL UNIQUE COMMENT 'Email do usuário',
        departamento VARCHAR(100) DEFAULT NULL COMMENT 'Departamento do usuário',
        perfil ENUM('1', '2') NOT NULL DEFAULT '2' COMMENT '1=Admin, 2=Usuário',
        ativo ENUM('1', '0') NOT NULL DEFAULT '1' COMMENT '1=Ativo, 0=Inativo',
        senha VARCHAR(255) NOT NULL COMMENT 'Senha criptografada',
        login TIMESTAMP NULL DEFAULT NULL COMMENT 'Último login do usuário',
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Data de cadastro',
        data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data da última atualização'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    if ($conexao->query($sql_usuario) === TRUE) {
        echo "<p>✓ Tabela 'usuario' criada/verificada</p>";
    } else {
        throw new Exception("Erro ao criar tabela usuario: " . $conexao->error);
    }
    
    // Criar tabela diplomas
    $sql_diplomas = "CREATE TABLE IF NOT EXISTS diplomas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        docaluno VARCHAR(20) NOT NULL COMMENT 'Documento do aluno (RG/CPF)',
        doc VARCHAR(20) NOT NULL COMMENT 'Documento do aluno (RG/CPF) - campo duplicado para compatibilidade',
        nome VARCHAR(255) NOT NULL COMMENT 'Nome completo do aluno',
        nomedoaluno VARCHAR(255) NOT NULL COMMENT 'Nome completo do aluno - campo duplicado para compatibilidade',
        curso VARCHAR(255) NOT NULL COMMENT 'Nome do curso',
        instexpedidora VARCHAR(255) NOT NULL COMMENT 'Instituição de Ensino Expedidora',
        codigoemec VARCHAR(20) DEFAULT NULL COMMENT 'Código E-mec do Curso',
        ingressoCurso DATE DEFAULT NULL COMMENT 'Data de ingresso no curso',
        conclusaoCurso DATE DEFAULT NULL COMMENT 'Data de conclusão do curso',
        instregistradora VARCHAR(255) NOT NULL COMMENT 'Instituição Registradora',
        dataExpedicao DATE DEFAULT NULL COMMENT 'Data de expedição do diploma',
        dataregistroDiploma DATE NOT NULL COMMENT 'Data do registro do diploma',
        dataRegistroDou DATE DEFAULT NULL COMMENT 'Data de publicação no DOU',
        numeroProcesso VARCHAR(50) DEFAULT NULL COMMENT 'Número do processo',
        emecCurso VARCHAR(20) DEFAULT NULL COMMENT 'Código E-mec do Curso (compatibilidade)',
        nomeFexp VARCHAR(255) DEFAULT NULL COMMENT 'Nome da Faculdade Expedidora (compatibilidade)',
        emecFexp VARCHAR(20) DEFAULT NULL COMMENT 'Código E-mec da Faculdade Expedidora (compatibilidade)',
        nomeFregistro VARCHAR(255) DEFAULT NULL COMMENT 'Nome da Faculdade Registradora (compatibilidade)',
        emecFregistro VARCHAR(20) DEFAULT NULL COMMENT 'Código E-mec da Faculdade Registradora (compatibilidade)',
        datainicialCurso DATE DEFAULT NULL COMMENT 'Ingresso no Curso (compatibilidade)',
        datafinalCurso DATE DEFAULT NULL COMMENT 'Conclusão do Curso (compatibilidade)',
        dataColacao DATE DEFAULT NULL COMMENT 'Data da colação de grau (compatibilidade)',
        processoNumero VARCHAR(50) DEFAULT NULL COMMENT 'Número do processo (compatibilidade)',
        registroDiplomaNumero VARCHAR(50) DEFAULT NULL COMMENT 'Número do registro do diploma (compatibilidade)',
        numeroLivro VARCHAR(20) DEFAULT NULL COMMENT 'Número do livro (compatibilidade)',
        numeroFolha VARCHAR(20) DEFAULT NULL COMMENT 'Número da folha (compatibilidade)',
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Data de cadastro do registro',
        data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data da última atualização'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    if ($conexao->query($sql_diplomas) === TRUE) {
        echo "<p>✓ Tabela 'diplomas' criada/verificada</p>";
    } else {
        throw new Exception("Erro ao criar tabela diplomas: " . $conexao->error);
    }
    
    // Criar tabela diploma (compatibilidade)
    $sql_diploma = "CREATE TABLE IF NOT EXISTS diploma (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cpf VARCHAR(14) NOT NULL COMMENT 'CPF do aluno',
        nome VARCHAR(255) NOT NULL COMMENT 'Nome completo do aluno',
        curso VARCHAR(255) NOT NULL COMMENT 'Nome do curso',
        emecCurso VARCHAR(20) DEFAULT NULL COMMENT 'Código E-mec do Curso',
        nomeFexp VARCHAR(255) DEFAULT NULL COMMENT 'Nome da Faculdade Expedidora',
        emecFexp VARCHAR(20) DEFAULT NULL COMMENT 'Código E-mec da Faculdade Expedidora',
        nomeFregistro VARCHAR(255) DEFAULT NULL COMMENT 'Nome da Faculdade Registradora',
        emecFregistro VARCHAR(20) DEFAULT NULL COMMENT 'Código E-mec da Faculdade Registradora',
        datainicialCurso DATE DEFAULT NULL COMMENT 'Ingresso no Curso',
        datafinalCurso DATE DEFAULT NULL COMMENT 'Conclusão do Curso',
        dataregistroDiploma DATE NOT NULL COMMENT 'Data do registro do diploma',
        dataColacao DATE DEFAULT NULL COMMENT 'Data da colação de grau',
        dataRegistroDou DATE DEFAULT NULL COMMENT 'Data de publicação no DOU',
        processoNumero VARCHAR(50) DEFAULT NULL COMMENT 'Número do processo',
        registroDiplomaNumero VARCHAR(50) DEFAULT NULL COMMENT 'Número do registro do diploma',
        numeroLivro VARCHAR(20) DEFAULT NULL COMMENT 'Número do livro',
        numeroFolha VARCHAR(20) DEFAULT NULL COMMENT 'Número da folha',
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Data de cadastro do registro',
        data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data da última atualização'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    if ($conexao->query($sql_diploma) === TRUE) {
        echo "<p>✓ Tabela 'diploma' criada/verificada (compatibilidade)</p>";
    } else {
        throw new Exception("Erro ao criar tabela diploma: " . $conexao->error);
    }
    
    // Criar índices
    $indices = [
        "CREATE INDEX IF NOT EXISTS idx_usuario_email ON usuario(email)",
        "CREATE INDEX IF NOT EXISTS idx_usuario_cpf ON usuario(cpf)",
        "CREATE INDEX IF NOT EXISTS idx_usuario_perfil ON usuario(perfil)",
        "CREATE INDEX IF NOT EXISTS idx_usuario_ativo ON usuario(ativo)",
        "CREATE INDEX IF NOT EXISTS idx_diplomas_docaluno ON diplomas(docaluno)",
        "CREATE INDEX IF NOT EXISTS idx_diplomas_nome ON diplomas(nome)",
        "CREATE INDEX IF NOT EXISTS idx_diplomas_curso ON diplomas(curso)",
        "CREATE INDEX IF NOT EXISTS idx_diplomas_dataregistro ON diplomas(dataregistroDiploma)",
        "CREATE INDEX IF NOT EXISTS idx_diplomas_codigoemec ON diplomas(codigoemec)",
        "CREATE INDEX IF NOT EXISTS idx_diploma_cpf ON diploma(cpf)",
        "CREATE INDEX IF NOT EXISTS idx_diploma_nome ON diploma(nome)",
        "CREATE INDEX IF NOT EXISTS idx_diploma_curso ON diploma(curso)",
        "CREATE INDEX IF NOT EXISTS idx_diploma_dataregistro ON diploma(dataregistroDiploma)"
    ];
    
    foreach ($indices as $indice) {
        if ($conexao->query($indice) === TRUE) {
            echo "<p>✓ Índice criado</p>";
        }
    }
    
    // Verificar se já existe usuário administrador
    $verificar_admin = "SELECT COUNT(*) as total FROM usuario WHERE email = 'admin@genesis.com'";
    $resultado = $conexao->query($verificar_admin);
    $linha = $resultado->fetch_assoc();
    
    if ($linha['total'] == 0) {
        // Inserir usuário administrador padrão
        $sql_admin = "INSERT INTO usuario (cpf, nome, email, departamento, perfil, ativo, senha) 
                     VALUES ('000.000.000-00', 'Administrador do Sistema', 'admin@genesis.com', 'Administração', '1', '1', MD5('admin123'))";
        
        if ($conexao->query($sql_admin) === TRUE) {
            echo "<p>✓ Usuário administrador criado</p>";
        } else {
            echo "<p>⚠ Aviso: Erro ao criar usuário administrador: " . $conexao->error . "</p>";
        }
    } else {
        echo "<p>✓ Usuário administrador já existe</p>";
    }
    
    echo "<hr>";
    echo "<h3>✅ Instalação Concluída com Sucesso!</h3>";
    echo "<p><strong>Dados de acesso:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Email:</strong> admin@genesis.com</li>";
    echo "<li><strong>Senha:</strong> admin123</li>";
    echo "</ul>";
    echo "<p><strong>Próximos passos:</strong></p>";
    echo "<ol>";
    echo "<li>Atualize o arquivo <code>adm/conexao.php</code> com as credenciais corretas do seu banco</li>";
    echo "<li>Faça login no sistema</li>";
    echo "<li>Altere a senha do administrador</li>";
    echo "<li>Delete este arquivo (instalar_banco.php) por segurança</li>";
    echo "</ol>";
    
    echo "<p style='color: red; font-weight: bold;'>⚠ IMPORTANTE: Delete este arquivo após a instalação por segurança!</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>❌ Erro durante a instalação:</strong> " . $e->getMessage() . "</p>";
    echo "<p>Verifique as configurações de conexão no início deste arquivo.</p>";
}

$conexao->close();
?>

<style>
body { font-family: Arial, sans-serif; margin: 20px; }
h2, h3 { color: #333; }
p { margin: 5px 0; }
code { background: #f4f4f4; padding: 2px 4px; border-radius: 3px; }
ul, ol { margin: 10px 0; padding-left: 20px; }
hr { margin: 20px 0; border: 1px solid #ddd; }
</style>


