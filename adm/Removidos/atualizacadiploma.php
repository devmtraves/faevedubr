<?php
session_start();
require 'topoadm.php';
require 'adm/funcsistema.php';

//Recebendo o registro para pesquisar Cpf do Aluno

$id_diploma = $_GET['id'];

//var_dump($id_diploma);

?>

<?php

$ListarRegistros = consultaRegistro($conexao, $id_diploma); // selecionar pelo id do certificado que foi clicado na página 

//var_dump($ListarRegistros);

if ($ListarRegistros == null) {

    echo "<div class='alert alert-warning' role='alert'>
    Registro Não Localizado!
  </div>";

    die;
}

if (empty($_SESSION['id'])) {

  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text" href="./css/main.css">
    <title>Portal</title>
</head>

<body>

    <div class="container">

        <div class="form">

            <form class="row g-3" action="adm/processa-cadastro-diploma.php" method="POST">
                <section class="test">
                    <p class="text-center">Atualização do Diploma</p>
                </section>
                   <!--Campo Hidden-->
 
        
                <div class="col-md-3">
     <input class="form-control form-control-sm" type="hidden" class="form-control" id="formGroupExampleInput" name="id" value="<?php echo $ListarRegistros[0]['id']; ?> "readonly>
      </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Nome
                        Completo</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="nomedoaluno" value="<?php echo $ListarRegistros[0]['nomedoaluno']; ?>"  required>
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">CPF</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="doc" value="<?php echo $ListarRegistros[0]['doc']; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Nome do
                        Curso</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="curso" value="<?php echo $ListarRegistros[0]['curso']; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Código E-mec do Curso
                        </label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="codigoemec" value="<?php echo $ListarRegistros[0]['codigoemec']; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Instituição
                        de Ensino Expedidora</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="instexpedidora" value="<?php echo $ListarRegistros[0]['instexpedidora']; ?>"
                        required>
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Instituição
                        de Registradora</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="instregistradora" value="<?php echo $ListarRegistros[0]['instregistradora']; ?>"
                        required>
                </div>


                <div class="col-md-3">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Ingresso no
                        Curso</label>
                    <input type="text" class="form-control" name="iniciodocurso" value="<?php echo !empty($ListarRegistros[0]['ingressoCurso']) ? date('d/m/Y', strtotime($ListarRegistros[0]['ingressoCurso'])) : ''; ?>" requerid>
                </div>

                <div class="col-md-3">
                     <label class="form-label fw-bold">Conclusão do Curso</label>
                <input type="text" class="form-control" name="conclusaodocurso" value="<?php echo !empty($ListarRegistros[0]['conclusaoCurso']) ? date('d/m/Y', strtotime($ListarRegistros[0]['conclusaoCurso'])) : ''; ?>" requerid>
            </div>

                <div class="col-md-3">
                       <label class="form-label fw-bold">Data de Registro</label>
                <input type="text" class="form-control" name="datadeexpedicao" value="<?php echo !empty($ListarRegistros[0]['dataregistroDiploma']) ? date('d/m/Y', strtotime($ListarRegistros[0]['dataregistroDiploma'])) : ''; ?>" requerid>
            </div>
                

              
            <div class="col-md-4">
                <label class="form-label fw-bold">Data da Publicação no DOU</label>
                <input type="text" class="form-control" name="dataRegistroDou" value="<?php echo !empty($ListarRegistros[0]['dataRegistroDou']) ? date('d/m/Y', strtotime($ListarRegistros[0]['dataRegistroDou'])) : ''; ?>" requerid>
            </div>
            

                <div class="col-md-20">
                    <input class="btn-sm btn-primary" type="submit" value="Salvar">
                </div>
            </form>

        </div>
    </div>
</body>

</html>