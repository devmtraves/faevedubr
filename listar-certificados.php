<?php
session_start();
require 'adm/conexao.php';
require 'adm/funcsistema.php';
require 'topoadm.php';

if (empty($_SESSION['id'])) {
    header('location:index.php');
}
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
                    <th scope="col">Atualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ListarCertifados = ListarCertificado($conexao);

                foreach ($ListarCertifados as $certificados) :
                ?>
                <tr>
                    <td><?= htmlspecialchars($certificados['nome']); ?></td>
                    <td><?= htmlspecialchars($certificados['doc']); ?></td>
                    <td><?= htmlspecialchars($certificados['curso']); ?></td>
                    <td><?= htmlspecialchars($certificados['livro']); ?></td>
                    <td class="text-center"><?= htmlspecialchars($certificados['ch']); ?></td>
                    <td class="text-center">
                        <a href="consultar-certificadoadm.php?id=<?= $certificados['id']; ?>" target="_blank"
                            class="btn btn-primary">
                            <i class="bi bi-search"></i> visualizar
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="adm/atualizar-certificado.php?id=<?= $certificados['id']; ?>" target="_blank"
                            class="btn btn-primary">
                            <i class="bi bi-search"></i> Atualizar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end mt-4">
        <a href="paineladm.php" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    </div>

</div>

<?php require 'rodape.php'; ?>
