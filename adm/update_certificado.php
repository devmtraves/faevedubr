<pre>
<?php

require 'funcsistema.php';
require 'conexao.php';
{
  $docaluno = $_POST['doc'];
  $nome     = $_POST['Nome'];
  $curso    = $_POST['Curso'];
  
  $ch        = $_POST['Ch'];
  $tipoCurso = $_POST['TipoCurso'];
  $id        = $_POST['id'];

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

  // AQUI aplica a conversão
  $dataEmissao      = formatarData($_POST['DataDeEmissao']);
  $datadeInicio     = formatarData($_POST['DataDeInicio']);
  $datadeConclusao  = formatarData($_POST['DataDeConclusao']);
  //var_dump($_POST['DataDeInicio']);
//var_dump($datadeInicio);
//exit;


  // Envia para a função já no formato correto
  updatCertificado(
      $conexao,
      $docaluno,
      $nome,
      $curso,
      $dataEmissao,
      $datadeInicio,
      $datadeConclusao,
      $ch,
      $tipoCurso,
      $id
  );
}

$stmt->close();
$conexao->close();


?>