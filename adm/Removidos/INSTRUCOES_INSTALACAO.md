# 📋 Instruções de Instalação - Sistema Genesis

## 🎯 Visão Geral
Este guia irá ajudá-lo a instalar o banco de dados do Sistema de Gestão Acadêmica Genesis na sua hospedagem.

## 📁 Arquivos Fornecidos

1. **`criar_banco_dados.sql`** - Script SQL para execução manual
2. **`instalar_banco.php`** - Script PHP para instalação automática
3. **`INSTRUCOES_INSTALACAO.md`** - Este arquivo de instruções

## 🚀 Método 1: Instalação Automática (Recomendado)

### Passo 1: Configurar o Script
1. Abra o arquivo `instalar_banco.php`
2. Altere as configurações no início do arquivo:
   ```php
   $servidor = "localhost";           // Seu servidor de banco
   $usuario = "seu_usuario";         // Seu usuário do banco
   $senha = "sua_senha";             // Sua senha do banco
   $nome_banco = "genesis";          // Nome do banco (pode alterar)
   ```

### Passo 2: Executar a Instalação
1. Faça upload do arquivo `instalar_banco.php` para sua hospedagem
2. Acesse: `https://seudominio.com/instalar_banco.php`
3. Aguarde a conclusão da instalação
4. **IMPORTANTE**: Delete o arquivo `instalar_banco.php` após a instalação

### Passo 3: Configurar Conexão
1. Abra o arquivo `adm/conexao.php`
2. Atualize com suas credenciais:
   ```php
   $servidor = "localhost";          // Seu servidor
   $usuario = "seu_usuario";        // Seu usuário
   $senha = "sua_senha";            // Sua senha
   $banco = "genesis";              // Nome do banco criado
   ```

## 🛠️ Método 2: Instalação Manual

### Passo 1: Acessar phpMyAdmin
1. Entre no painel de controle da sua hospedagem
2. Acesse o phpMyAdmin ou ferramenta de banco de dados

### Passo 2: Executar Script SQL
1. Selecione "SQL" no menu
2. Copie todo o conteúdo do arquivo `criar_banco_dados.sql`
3. Cole no campo de texto
4. Clique em "Executar"

### Passo 3: Configurar Conexão
Siga o Passo 3 do Método 1 acima.

## 🔐 Dados de Acesso Padrão

Após a instalação, você terá acesso com:
- **Email**: admin@genesis.com
- **Senha**: admin123

⚠️ **IMPORTANTE**: Altere a senha imediatamente após o primeiro login!

## 📊 Estrutura do Banco Criado

### Tabelas Principais:
- **`usuario`** - Gerencia usuários do sistema
- **`diplomas`** - Registra diplomas (versão atual)
- **`diploma`** - Compatibilidade com código antigo

### Recursos Incluídos:
- ✅ Suporte completo a UTF-8
- ✅ Chaves primárias auto-incrementais
- ✅ Timestamps automáticos para auditoria
- ✅ Índices para melhor performance
- ✅ Compatibilidade com código existente
- ✅ Usuário administrador pré-configurado

## 🔧 Verificação da Instalação

### Teste 1: Conexão
1. Acesse `https://seudominio.com/index.php`
2. Tente fazer login com as credenciais padrão
3. Se conseguir acessar, a instalação foi bem-sucedida

### Teste 2: Funcionalidades
1. Cadastre um novo usuário
2. Cadastre um diploma de teste
3. Verifique se os dados são salvos corretamente

## ❗ Solução de Problemas

### Erro de Conexão
- Verifique se as credenciais em `adm/conexao.php` estão corretas
- Confirme se o banco de dados foi criado
- Verifique se o servidor MySQL está ativo

### Erro de Permissões
- Verifique se o usuário do banco tem permissões para criar tabelas
- Entre em contato com o suporte da hospedagem se necessário

### Erro de Charset
- Certifique-se de que o banco foi criado com UTF-8
- Verifique se o arquivo `conexao.php` define o charset corretamente

## 📞 Suporte

Se encontrar problemas durante a instalação:

1. Verifique os logs de erro do PHP
2. Confirme as configurações de banco de dados
3. Teste a conexão manualmente
4. Entre em contato com o suporte técnico se necessário

## 🔒 Segurança

### Após a Instalação:
1. ✅ Delete o arquivo `instalar_banco.php`
2. ✅ Altere a senha do administrador
3. ✅ Configure usuários com permissões adequadas
4. ✅ Mantenha backups regulares do banco
5. ✅ Monitore logs de acesso

## 📈 Próximos Passos

1. **Configurar usuários**: Crie usuários para sua equipe
2. **Personalizar sistema**: Ajuste conforme suas necessidades
3. **Treinar usuários**: Ensine a equipe a usar o sistema
4. **Fazer backup**: Configure backups automáticos
5. **Monitorar**: Acompanhe o uso e performance

---

**Sistema Genesis v1.0** - Sistema de Gestão Acadêmica


