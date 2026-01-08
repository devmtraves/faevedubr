<pre>
<?php

require 'funcsistema.php';
 {
  $docUsuario = $_POST['cpf'];
  $nomeUsuario = $_POST['nomeusuario'];
  $login = $_POST['email'];
  $depUsuario = $_POST['departamento'];
  $pfUsuario = $_POST['status'];
  $tipoPerfil = $_POST['perfil'];

 
  //Enviando as informações para Atualização do Login
  updatUser($conexao,$docUsuario,$nomeUsuario, $login,$depUsuario,$pfUsuario,$tipoPerfil);
}

?>
</pre>