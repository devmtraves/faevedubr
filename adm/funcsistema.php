<?php
//Config configuração da conexão do banco usuário e informações do banco
require 'conexao.php'; 
//Funcion para cadastrar 
function cadUsuario($conexao, $cpf, $nome, $email, $departamento, $stausUsuario, $perfil, $senha)
{
    $SqlCadastro = "INSERT INTO usuario (cpf,nome,email,departamento,perfil,ativo,senha) VALUES('$cpf','$nome','$email','$departamento','$stausUsuario','$perfil','$senha')";

    $exeCadastro = mysqli_query($conexao, $SqlCadastro);

    if ($exeCadastro > 0) {

        header('location:usuarios.php');
    } else {

        echo "Cadastro não Efetuado";

        header('location:cadastro.php');
    }
}
//Function Processa Login do Usuário no Sistema
function logarUsuario($conexao, $login, $senha)
{
    // SELECT DO LOGIN E SENHA DO USUÁRIO
    $queryLogin = "SELECT * FROM usuario WHERE email ='$login' AND senha = '$senha' LIMIT 1";

    $resultadoLogin = mysqli_query($conexao, $queryLogin);

    $resultadoDadosUsuario = mysqli_fetch_assoc($resultadoLogin);

    //Array criado  para guardar os dados do usuário encontrado
    $dados = array();

    $dados[] = $resultadoDadosUsuario;

    if ($resultadoDadosUsuario != null) {
        //Criando a session com os dados do login
        $_SESSION['id'] = $dados[0]['email'];
        $_SESSION['nomeuser'] = $dados[0]['nome'];

        $perfilUsuario = $dados[0]['perfil'];

        $login = $dados[0]['email'];

        $updateLogin = atualizaLogin($conexao, $login);

        // return $updateLogin;

        if ($perfilUsuario == 1) {
            header('location:paineladm.php');
        } else {

            header('location:painelusuario.php');
        }
    } else {


        header('location:error.html');
    }
}

//function que faz o registro do último login do usuário
function atualizaLogin($conexao, $id)
{

    $atualuzarLogin = "UPDATE usuario SET login = CURRENT_TIMESTAMP() WHERE usuario.email = '$id'";
    $resultado = mysqli_query($conexao, $atualuzarLogin); // SELECIONANDO INFORMARÇÂO CONFORME O ID

    //echo($resultado);

}

//Function Set User 
function updatUser($conexao,$docUsuario, $nomeUsuario, $login,$depUsuario,$pfUsuario,$tipoPerfil  ){

$sqlUpate = "UPDATE usuario SET nome='$nomeUsuario', email='$login' ,departamento='$depUsuario' ,ativo='$pfUsuario', perfil='$tipoPerfil',cpf = '$docUsuario' where cpf='$docUsuario'";
$resultUpdate =mysqli_query($conexao,$sqlUpate);

if($resultUpdate > 0){
    header('location:../usuarios.php');

}else {

    echo "Nada para Atualizar";
}
}
//Function call delete User 
function deletarUsuario($conexao, $login)
{

    $excluirUsuario = "DELETE FROM usuario where cpf='$login' LIMIT 1";

    $exeDeletarLogin = mysqli_query($conexao, $excluirUsuario);

    if ($exeDeletarLogin > 0) {

        header('location:../usuarios.php');
    } else {
        echo "ℹ️ Não encontramos registros para remover no momento.";
    }
}

//Function date user Select Usuário 
function selectUsuario($conexao,$login){

    $selecUsuario = "SELECT cpf,nome,email,ativo,perfil,departamento,id FROM  usuario where id='$login' LIMIT 1"; // alterado para buscar pelo ID

    $exeUsuario = mysqli_query($conexao,$selecUsuario);
    $dados = array();
    
    foreach ($exeUsuario as $infoUser){
        $dados[ ]= $infoUser;
        
    }
return $dados;
    
}
//Funcion que lista todos os usuários do sistemas
function lerUsuarios($conexao)
        {
            $sqlUsuario = 'SELECT nome,email,departamento ,cpf ,ativo,id FROM  usuario  ORDER BY nome ';
            //var_dump('Debug usuários query  ' . $sqlUsuario);
            $resulUsuario = mysqli_query($conexao, $sqlUsuario);
            
            //Aqui foi criado um array  que vou usar para guardas os dados da query
            $usuarios = array();
                while ($usuario = mysqli_fetch_assoc($resulUsuario)) {
            $usuarios[] = $usuario;
            //var_dump('Debug usuários array  ' . $usuario);
    }
     return $usuarios;
}
//Function Insert Register
function diploma($conexao, $docaluno, $nome, $curso, $emecCurso, $nomeFexp, $emecFexp, $nomeFregistro, $emecFregistro, $datainicialCurso, $datafinalCurso, $dataregistroDiploma, $dataColacao, $dataRegistroDou, $processoNumero, $registroDiplomaNumero, $numeroLivro, $numeroFolha)
{

    $insertDiploma = " INSERT INTO diploma (cpf,nome ,curso ,emecCurso ,nomeFexp ,
    emecFexp ,nomeFregistro ,emecFregistro ,datainicialCurso ,datafinalCurso ,dataregistroDiploma ,
    dataColacao ,dataRegistroDou ,processoNumero ,	registroDiplomaNumero, numeroLivro ,numeroFolha ) VALUES ('$docaluno','$nome','$curso','$emecCurso','$nomeFexp','$emecFexp','$nomeFregistro','$emecFregistro','$datainicialCurso','$datafinalCurso','$dataregistroDiploma', '$dataColacao', '$dataRegistroDou','$processoNumero',' $registroDiplomaNumero', '$numeroLivro','$numeroFolha')";
    $exeInsertDiploma = mysqli_query($conexao, $insertDiploma);
    return $exeInsertDiploma;
}
 //Function insert certificado
function certificado($conexao, $docaluno, $nome, $curso, $dataEmissao, $datadeInicio, $datadeConclusao, $ch, $tipoCurso)
{

    $insertCertificado = " INSERT INTO certificado (cpf,nome ,curso ,dataEmissao ,dataDeInicio ,dataDeConclusao ,ch ,tipoCurso ) VALUES ('$docaluno','$nome','$curso','$dataEmissao','$datadeInicio','$datadeConclusao','$ch','$tipoCurso')";
    $exeInsertCertificado = mysqli_query($conexao, $insertCertificado);

    return $exeInsertCertificado;
}

function consulta($conexao)
{

    //date_format(dataregistroDiploma,'%d/%m/%Y') dataregistroDiploma Formatação da data no mysql

    $sqlDiploma = "SELECT doc,nomedoaluno,curso, date_format(dataregistroDiploma,'%d/%m/%Y') dataregistroDiploma FROM  diploma  ORDER BY dataregistroDiploma ";

    $resulUsuario = mysqli_query($conexao, $sqlDiploma);

    //Aqui foi criado um array  que vou usar para guardas os dados da query
    $usuarios = array();


    while ($usuario = mysqli_fetch_assoc($resulUsuario)) {

        $usuarios[] = $usuario;
    }

    return $usuarios;
}

function consultaRegistro($conexao, $id_diploma)
{

    // foi modifica a função para tratar por id para editar
    $sqlDiploma = "SELECT * FROM  diploma where id='$id_diploma' "; 
    $resulUsuario = mysqli_query($conexao, $sqlDiploma);

    //Aqui foi criado um array  que vou usar para guardas os dados da query
    $usuarios = array();


    while ($usuario = mysqli_fetch_assoc($resulUsuario)) {

        $usuarios[] = $usuario;
    }

    return $usuarios;
}
//Function consultar certificados
function consultarCertificados($conexao, $id)
{

    //date_format(dataregistroDiploma,'%d/%m/%Y') dataregistroDiploma Formatação da data no mysql

    // Removido o limite para garantir que todos os registros sejam considerados

    $sqlCertificados = "SELECT * FROM  certificados where id='$id' ";  // Alterado para buscar pelo ID
    $resulCertficados = mysqli_query($conexao, $sqlCertificados);

    //Aqui foi criado um array  que vou usar para guardas os dados da query
    $certificados = array();


    while ($respCertificados = mysqli_fetch_assoc($resulCertficados)) {

        $certificados[] = $respCertificados;
    }

    return $certificados;
}

//Funcion delete registro diploma conforme o id
function deletDiploma($conexao, $doc)
{

    $deletDiploma = "DELETE FROM diploma where doc ='$doc' LIMIT 1";

    $sql = mysqli_query($conexao, $deletDiploma);

    if ($sql > 0) {

        header('location:../diplomas-cadastrados.php');
    } else {

        echo "Não Foi Localizado Dados Para Remoção ! ";
    }
}

//Listar todos os diplomas registrados
function listarDiplomas($conexao)
{

    $sql = 'SELECT nomedoaluno,doc,curso,id FROM  diploma  ORDER BY nomedoaluno ';

    $resulUsuario = mysqli_query($conexao, $sql);

    //Array que armazena o resultado
    $usuarios = array();
    while ($usuario = mysqli_fetch_assoc($resulUsuario)) {

        $usuarios[] = $usuario;
    }

    return ($usuarios);
}

function ListarCertificado($conexao)
{

    $sql = 'SELECT nome,doc,curso,id,ch,livro FROM  certificados  ORDER BY id ';

    $resulCertificados = mysqli_query($conexao, $sql);
    //var_dump($resulCertificados);

    //Array que armazena o resultado dos certificados
    $usuarios = array();
    while ($certificados = mysqli_fetch_assoc($resulCertificados)) {

        $usuarios[] = $certificados;
        
    }

    return ($usuarios);
}
//Função responsável por atualizar o certificado
function updatCertificado(
    $conexao, $docaluno, $nome, $curso,
    $dataEmissao, $datadeInicio, $datadeConclusao,
    $ch, $tipoCurso, $id
){
    $sql = "
        UPDATE certificados SET
            doc = ?,
            nome = ?,
            curso = ?,
            DataDeEmissao = ?,
            DataDeInicio = ?,
            DataDeConclusao = ?,
            ch = ?,
            tipoCurso = ?
        WHERE id = ?
    ";

    $stmt = mysqli_prepare($conexao, $sql);
    
    if (!$stmt) {
        die('Erro ao preparar: ' . mysqli_error($conexao));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssisi",
        $docaluno,
        $nome,
        $curso,
        $dataEmissao,        // 'YYYY-mm-dd' ou null
        $datadeInicio,       // 'YYYY-mm-dd' ou null
        $datadeConclusao,    // 'YYYY-mm-dd' ou null
        $ch,
        $tipoCurso,
        $id
    );

    $resultado = mysqli_stmt_execute($stmt);
    
    if (!$resultado) {
        die('Entre em contato com o suporte técnico : ' . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
    header("Location: ../listar-certificados.php");
    //return true;
}
