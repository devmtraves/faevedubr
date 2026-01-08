<?php

//require 'top.php';
require 'adm/funcsistema.php';


//Recebendo o registro para pesquisar Nome ou CPF do Aluno



$dadosAluno = $_GET['termo'];



$ListarRegistros = consultaRegistro($conexao, $dadosAluno);

if ($ListarRegistros == null) {

  echo "<div class='alert alert-warning' role='alert'>
    Registro Não Localizado!
  </div>";

  die;
}
//var_dump($ListarRegistros);
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
    <title>ACAD-SYSTEM</title>
</head>

<body>

 
    <div class="container">

        <div class="row g-3">
            <form class="row g-3" action="adm/processa-cadastro-diploma.php" method="POST">
                <section class="test">

                </section>
                <div class="col-md-12">

                    <label for="formGroupExampleInput"
                        class="form-label text-capitalize text-end fw-bold ">Nome:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" name="nomedoaluno"
                        value="<?php echo $ListarRegistros[0]['nomedoaluno']; ?> " readonly>
                </div>
                <div class="col-md-3">
                    <!--Campo Hidden
                    <input type="hidden" name="id" value="<?php echo $ListarRegistros['docaluno']; ?>">-->
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">CPF:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="docaluno" value="<?php echo $ListarRegistros[0]['doc']; ?>"
                        readonly>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput"
                        class="form-label text-capitalize text-end fw-bold ">curso:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="curso" value="<?php echo $ListarRegistros[0]['curso']; ?>"
                        readonly>
                </div>

                <div class="col-md-3">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Código E-mec do Curso:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="emeccurso"
                        value="<?php echo $ListarRegistros[0]['codigoemec']; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Instituição
                        Expedidora:
                    </label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="facexp"
                        value="<?php echo $ListarRegistros[0]['instexpedidora']; ?>" readonly>
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Instituição
                        Registradora:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="emecFexp"
                        value="<?php echo $ListarRegistros[0]['instregistradora']; ?>" readonly>
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Data Inicial
                        do curso:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="iniciodocurso"
                        value="<?php echo date('d/m/Y',strtotime( $ListarRegistros[0]['ingressoCurso'])); ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Data Final
                        do curso:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="conclusaodocurso"
                        
                        value="<?php echo date('d/m/Y',strtotime( $ListarRegistros[0]['conclusaoCurso'])); ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Data Expedição:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="conclusaodocurso"
                        
                        value="<?php echo date('d/m/Y',strtotime( $ListarRegistros[0]['dataExpedicao'])); ?>" readonly>
                </div>

                <div class="col-md-4">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold">
                        Data de Registro:
                    </label>
                    <input class="form-control form-control-sm" type="text" id="formGroupExampleInput"
                        name="datadeexpedicao" value="<?php
                 if (!empty($ListarRegistros[0]['dataregistroDiploma'])) {
                // Formata para dd/mm/yyyy (Brasil)
                echo date('d/m/Y', strtotime($ListarRegistros[0]['dataregistroDiploma']));
                }
                ?>" readonly>
                </div>

                
                <div class="col-md-4">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Nº de
                        Registro:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="dataRegistroDou"
                        value="<?php echo $ListarRegistros[0]['numeroProcesso']; ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Data da Publicação no DOU:</label>
                    <input class="form-control form-control-sm" type="text" class="form-control"
                        id="formGroupExampleInput" name="dataRegistroDou"
                        value="<?php echo date('d/m/Y', strtotime( $ListarRegistros[0]['dataRegistroDou'])); ?>" readonly>
                </div>
                <a href="consultapublica.php" class="btn btn-outline-primary btn-sm" role="button"
                    aria-pressed="true">Nova Consulta?</a>
        </div>
        </form>

    </div>
    </div>

</body>

</html>

<div class="container">


</div>