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

    <h3 class="text-center text-uppercase text-primary mb-4">Diplomas Registrados</h3>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle shadow-sm bg-white rounded">
            <thead class="table-light text-uppercase text-center">
                <tr>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Abrir</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ListarDiploma = listarDiplomas($conexao);

                foreach ($ListarDiploma as $diplomas) :
                ?>
                <tr>
                    <td><?= htmlspecialchars($diplomas['nomedoaluno']); ?></td>
                    <td><?= htmlspecialchars($diplomas['doc']); ?></td>
                    <td><?= htmlspecialchars($diplomas['curso']); ?></td>
                    <td class="text-center">
                        <a href="consultar-dimplomadm.php?id=<?= $diplomas['id']; ?>" target="_blank"
                            class="btn btn-primary">
                            <i class="bi bi-search"></i> visualizar
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="adm/editar-diploma.php?id=<?= $diplomas['id']; ?>" target="_blank"
                            class="btn btn-danger">
                            <i class="bi bi-search"></i> Editar
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
