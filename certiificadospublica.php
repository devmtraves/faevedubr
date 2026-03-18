<?php
require 'pesquisacertificadospublica.php';

//header('location:index.php');
//}
require 'adm/consultas.php';
$dadosAluno = $_GET['termo'];
//var_dump($dadosAluno);
$ListarRegistros = consultaCertificados($conexao, $dadosAluno);
?>

<div class="container my-5">

    <h3 class="text-center text-uppercase text-primary mb-4">Certificados Registrados</h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle shadow-sm bg-white rounded">
            <thead class="table-light text-uppercase text-center">
                <tr>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Livro</th>
                    <th scope="col">C H</th>
                    <th scope="col">Abrir</th>
                    <!--<th scope="col">Atualizar</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                
                $ListarCertifados = consultaCertificados($conexao, $dadosAluno);
               // var_dump($ListarCertifados);
                foreach ($ListarCertifados as $certificados) :
                ?>
                <tr>
                    <td><?= htmlspecialchars($certificados['Nome']); ?></td>
                    <td><?= htmlspecialchars($certificados['doc']); ?></td>
                    <td><?= htmlspecialchars($certificados['Curso']); ?></td>
                    <td><?= htmlspecialchars($certificados['Livro']); ?></td>
                    <td class="text-center"><?= htmlspecialchars($certificados['Ch']); ?></td>
                    <td class="text-center">
                        <a href="consultar-certificadoadm.php?id=<?= $certificados['Registro']; ?>" target="_blank"
                            class="btn btn-primary">
                            <i class="bi bi-search"></i> Abrir
                        </a>
                    </td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    

</div>

<?php require 'rodape.php'; ?>
