<?php

require 'funcsistema.php';
require 'conexao.php';

$docaluno                = $_POST['doc'];                  // Número do documento do alunos
$nomecompleto            = $_POST['nomedoaluno'];          // Nome completo do aluno
$curso                   = $_POST['curso'];                // Nome do curso
$instexpeditora          = $_POST['instexpedidora'];       // Instituição de Ensino Expedidora
$instituicaoregistradora = $_POST['instregistradora'];     // Instituição Registradora
$codigoemec              = $_POST['codigoemec'];           // Código E-mec do Curso

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
$ingressoCurso           = formatarData($_POST['ingressoCurso']);        // Ingresso no Curso    
$conclusaoCurso          = formatarData($_POST['conclusaoCurso']);       // Conclusão do Curso
$dataExpedicao           = formatarData($_POST['dataExpedicao']);        // Data de Expedição
$dataregistroDiploma     = formatarData($_POST['dataregistroDiploma']);  // Data do Registro do Diploma
$dataRegistroDou         = formatarData($_POST['dataRegistroDou']); // Publicação no DOU
$numeroProcesso          = $_POST['numeroProcesso'];       // Número do Processo

// Preparando o INSERT
$sql = "INSERT INTO diploma (
            doc, nomedoaluno, curso, instexpedidora, codigoemec, ingressoCurso,
            conclusaoCurso, instregistradora, dataExpedicao, dataregistroDiploma,
            dataRegistroDou, numeroProcesso
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

// Usando prepared statement
$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "ssssssssssss",
    $docaluno,
    $nomecompleto,
    $curso,
    $instexpeditora,
    $codigoemec,
    $ingressoCurso,
    $conclusaoCurso,
    $instituicaoregistradora,
    $dataExpedicao,
    $dataregistroDiploma,
    $dataRegistroDou,
    $numeroProcesso
);

// Executa e verifica resultado
if ($stmt->execute()) {
    header("Location: ../diplomas-cadastrados.php");
    exit;
} else {
    echo "Erro ao cadastrar diploma: " . $stmt->error;
}

$stmt->close();
$conexao->close();