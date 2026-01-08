-- =============================================
-- SCRIPT DE CRIAÇÃO DO BANCO DE DADOS
-- SISTEMA DE GESTÃO ACADÊMICA GENESIS
-- =============================================

-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS genesis 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Usar o banco de dados
USE genesis;

-- =============================================
-- TABELA: usuario
-- Armazena os dados dos usuários do sistema
-- =============================================
CREATE TABLE IF NOT EXISTS usuario (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- TABELA: diplomas
-- Armazena os dados dos diplomas registrados
-- =============================================
CREATE TABLE IF NOT EXISTS diplomas (
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
    
    -- Campos adicionais para compatibilidade com funções antigas
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- TABELA: diploma (tabela antiga para compatibilidade)
-- Mantida para compatibilidade com código existente
-- =============================================
CREATE TABLE IF NOT EXISTS diploma (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- ÍNDICES PARA MELHOR PERFORMANCE
-- =============================================

-- Índices para tabela usuario
CREATE INDEX idx_usuario_email ON usuario(email);
CREATE INDEX idx_usuario_cpf ON usuario(cpf);
CREATE INDEX idx_usuario_perfil ON usuario(perfil);
CREATE INDEX idx_usuario_ativo ON usuario(ativo);

-- Índices para tabela diplomas
CREATE INDEX idx_diplomas_docaluno ON diplomas(docaluno);
CREATE INDEX idx_diplomas_nome ON diplomas(nome);
CREATE INDEX idx_diplomas_curso ON diplomas(curso);
CREATE INDEX idx_diplomas_dataregistro ON diplomas(dataregistroDiploma);
CREATE INDEX idx_diplomas_codigoemec ON diplomas(codigoemec);

-- Índices para tabela diploma (compatibilidade)
CREATE INDEX idx_diploma_cpf ON diploma(cpf);
CREATE INDEX idx_diploma_nome ON diploma(nome);
CREATE INDEX idx_diploma_curso ON diploma(curso);
CREATE INDEX idx_diploma_dataregistro ON diploma(dataregistroDiploma);

-- =============================================
-- DADOS INICIAIS
-- =============================================

-- Inserir usuário administrador padrão
-- Senha: admin123 (hash MD5)
INSERT INTO usuario (cpf, nome, email, departamento, perfil, ativo, senha) 
VALUES (
    '000.000.000-00', 
    'Administrador do Sistema', 
    'admin@genesis.com', 
    'Administração', 
    '1', 
    '1', 
    MD5('admin123')
) ON DUPLICATE KEY UPDATE nome = VALUES(nome);

-- =============================================
-- COMENTÁRIOS FINAIS
-- =============================================

/*
INSTRUÇÕES DE USO:

1. Execute este script no seu painel de controle da hospedagem (phpMyAdmin, cPanel, etc.)
2. Após executar, atualize o arquivo adm/conexao.php com as credenciais corretas:
   - $servidor: endereço do servidor de banco de dados
   - $usuario: nome de usuário do banco
   - $senha: senha do banco
   - $banco: nome do banco (genesis)

3. O sistema criará automaticamente:
   - Banco de dados 'genesis'
   - Tabela 'usuario' para gerenciar usuários do sistema
   - Tabela 'diplomas' para registrar diplomas (versão atual)
   - Tabela 'diploma' para compatibilidade com código antigo
   - Usuário administrador padrão (admin@genesis.com / admin123)

4. Após a criação, faça login com:
   - Email: admin@genesis.com
   - Senha: admin123

5. Recomenda-se alterar a senha do administrador após o primeiro login.

ESTRUTURA DO BANCO:
- Suporte completo a UTF-8
- Chaves primárias auto-incrementais
- Timestamps automáticos para auditoria
- Índices para melhor performance
- Compatibilidade com código existente
*/


