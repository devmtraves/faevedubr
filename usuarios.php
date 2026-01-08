 <?php
    session_start();
    require 'adm/conexao.php';

    require 'adm/funcsistema.php';

    require  'topoadm.php';/*topo da Página Administrativa*/



    if (empty($_SESSION['id'])) {

        header('location:index.php');
    }

    ?>

 <div class="container">


     <form method="POST" action="#">

         <h5 class="text-center text-uppercase text-dark bg-white"> Relatório de Usuários</h5>

         <table class="table text-center table-hover table-sm table-light ">
             <thead class="thead-light  text-uppercase">
                 <tr>
                     <th scope="col">Nome</th>
                     <th scope="col">Login</th>
                     <th scope="col">Departamento</th>
                     <th scope="col">Ativo</th>
                     <th scope="col">Editar</th>
                     <th scope="col">Deletar</th>
                 </tr>
             </thead>
             <?php
                $ListarUsuario = lerUsuarios($conexao);

                //Laço de Controle da lista de usuários 
                foreach ($ListarUsuario as $usuario) {


                ?>

                 <tr>
                     <td><?= $usuario['nome']; ?></td>
                     <td><?= $usuario['email']; ?></td>
                     <td><?= $usuario['departamento']; ?></td>
                     <td><?= $usuario['ativo']; ?></td>

                     <td><a href="adm/editar-usuario.php?id=<?= $usuario['id']; ?>" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Editar</a></td>
                     <td><a href="adm/excluir-usuario.php?id=<?= $usuario['id']; ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Remover</a></td>
                 </tr>


             <?php
                } ?>

         </table>

         <p class="text-center">O Campo Ativo é o Status do Perfil do Usuário 1 = Ativo e 2 = Inativo</p>
         <!--Botão de Retorno Painel Administrador-->
         <div class="d-flex justify-content-end mt-4">
        <a href="paineladm.php" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    
    </div>
     </form>
     </form>


 </div>


 <?php

    require 'rodape.php';
