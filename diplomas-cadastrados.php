<?php
session_start();
require 'adm/conexao.php';

require 'adm/funcsistema.php';


require 'topoadm.php';


if (empty($_SESSION['id'])) {

    header('location:index.php');
}

?>
<div class="container">
    <form method="POST" action="">
        <h6 class="text-center text-uppercase text-dark bg-white">Diplomas Registrados</h5>
        <table class="table text-center table-hover table-sm table-light ">
            <thead class="thead-light  text-uppercase">
                <tr>
                    <th scope="col">RG</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Data do Registro</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
           
           <?php
            
            $ListarRegistros = consulta($conexao);
            //Laço de Controle da listar de Registros de diploma 
            foreach ($ListarRegistros as $usuario) {

            ?>
                <tr>
                    <td><?= $usuario['doc']; ?></td>
                    <td><?= $usuario['nomedoaluno']; ?></td>
                    <td><?= $usuario['curso']; ?></td>
                    <td><?= $usuario['dataregistroDiploma']; ?></td>

                    <td><a href="adm/editar-diploma.php?id=<?= $usuario['doc']; ?>" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Editar</a></td>
                    <td><a href="adm/excluir-diploma.php?id=<?= $usuario['doc']; ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Excluir</a></td>
                </tr>

            <?php
            } ?>

        </table>
             <div class="nav" style="display: flex; justify-content: flex-end; padding: 05px;">
  <a href="paineladm.php" 
     style="display: flex; align-items: center; gap: 8px; 
            background: #208d05ff; color: white; 
            padding: 10px 16px; border-radius: 8px; 
            text-decoration: none; font-family: 'Segoe UI', sans-serif;
            font-weight: 600; transition: 0.3s;">
    
    Voltar
  </a>
</div>


    </form>