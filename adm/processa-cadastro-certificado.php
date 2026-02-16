<?php

require 'funcsistema.php';
require 'conexao.php';

$docaluno                = $_POST['doc'];                  // Número do documento do alunos
$nomecompleto            = $_POST['nomedoaluno'];          // Nome completo do aluno
var_dump($nomecompleto);
$curso                   = $_POST['curso'];                // Nome do curso
$tipoCurso               = $_POST['TipoCurso'];           // Tipo do curso
$ch                      = $_POST['ch'];                 // Carga horária
$livro                   = $_POST['livro'];              // número de registro livro
var_dump('Logo do Livro:',$livro);


 // Converte datas do formato dd/mm/yyyy para yyyy-mm-dd
    function formatarData($data) {
        if (!empty($data)) {
            $dt = DateTime::createFromFormat('d/m/Y', $data);
            if ($dt) {
                return $dt->format('Y-m-d');
            }
        }
        return null;
    }
$datadeDeInicio           = formatarData($_POST['DataDeInicio']);        // Ingresso no Curso    
$dataDeConclusao          = formatarData($_POST['DataDeConclusao']);       // Conclusão do Curso
$dataDeEmissao           = formatarData($_POST['DataDeEmissao']);        // Data de Emissão do Certificado

// Preparando o INSERT
$sql = "INSERT INTO certificados (
            doc, nome, curso, DataDeInicio, DataDeConclusao, DataDeEmissao, Ch, TipoCurso,Livro
        ) VALUES (?,?,?,?,?,?,?,?,?)";

// Usando prepared statement
$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssssssss",
    $docaluno,
    $nomecompleto,
    $curso,
    $datadeDeInicio,
    $dataDeConclusao,
    $dataDeEmissao,
    $ch,
    $tipoCurso,
    $livro
);


// Executa e verifica resultado
if ($stmt->execute()) {
    header("Location: ../listar-certificados.php");
    exit;
} else {
    echo "Erro ao cadastrar diploma: " . $stmt->error;
}

$stmt->close();
$conexao->close();