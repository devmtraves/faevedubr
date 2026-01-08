<?php
require 'conexao.php';

$id = $_POST['id_diploma'] ?? null;

if (!$id) {
    header('Location: editar-diploma.php?msg=erro');
    exit;
}

$nomedoaluno    = $_POST['nomedoaluno'];
$docaluno       = $_POST['doc'];
//var_dump($docaluno);
//exit;
$curso          = $_POST['curso'];
$codigoemec     = $_POST['codigoemec'];
$instexpedidora = $_POST['instexpedidora'];
$instregistradora = $_POST['instregistradora'];


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


$ingressoCurso          = formatarData($_POST['ingressoCurso']);
$conclusaoCurso         = formatarData($_POST['conclusaoCurso']);
$dataExpedicao          = formatarData($_POST['dataExpedicao']);
$dataregistroDiploma    = formatarData($_POST['dataregistroDiploma']);
$dataRegistroDou        = formatarData($_POST['dataRegistroDou']);
$numeroProcesso         = $_POST['numeroProcesso'];
//var_dump($numeroProcesso);
//exit;


$sql = "UPDATE diploma SET 
        nomedoaluno=?, doc=?, curso=?, codigoemec=?, instexpedidora=?, instregistradora=?, 
        ingressoCurso=?, conclusaoCurso=?, dataExpedicao=?, dataregistroDiploma=?, 
        numeroProcesso=?, dataRegistroDou=? 
        WHERE id=?";

$stmt = $conexao->prepare($sql);
$ok = $stmt->execute([
    $nomedoaluno, $docaluno, $curso, $codigoemec, $instexpedidora, $instregistradora,
    $ingressoCurso, $conclusaoCurso, $dataExpedicao, $dataregistroDiploma, $numeroProcesso, $dataRegistroDou, $id
]);

if ($ok) {
    header('Location: editar-diploma.php?id=' . $id . '&msg=sucesso');
} else {
    header('Location: editar-diploma.php?id=' . $id . '&msg=erro');
}
exit;
?>