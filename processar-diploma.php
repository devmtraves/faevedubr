<?php

require 'funcsistema.php';


require 'conexao.php';

$docaluno = $_POST['doc']; //<-Número do documento do aluno.
$nome = $_POST['nomedoaluno'];
$curso = $_POST['curso'];
$emecCurso = $_POST['emeccurso']; 
$nomeFexp = $_POST['facexp'];
$emecFexp = $_POST['emecFexp'];
$nomeFregistro = $_POST['facregistro'];
$emecFregistro = $_POST['emecregistro'];
$datainicialCurso = $_POST['datainicialCurso'];
$datafinalCurso = $_POST['datafinalCurso'];
$dataregistroDiploma = $_POST['dataregistroDiploma'];
$dataColacao = $_POST['dataColacao'];
$dataRegistroDou = $_POST['dataRegistroDou'];
$processoNumero = $_POST['numeroProcesso'];
$registroDiplomaNumero = $_POST['registroDiplomaNumero'];
$numeroLivro = $_POST['numLivro'];
$numeroFolha = $_POST['numFolha'];

$resultadoCadastro = cad_Diploma($conexao,$docaluno,$nome,$curso,$emecCurso,$nomeFexp,$emecFexp,$nomeFregistro,$emecFregistro,$datainicialCurso,$datafinalCurso,
$dataregistroDiploma, $dataColacao, $dataRegistroDou, $processoNumero, $registroDiplomaNumero, $numeroLivro,$numeroFolha);


if($resultadoCadastro > 0){

    header('location:../diplomas-cadastrados.php');
}