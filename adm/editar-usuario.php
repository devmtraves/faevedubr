<?php
session_start();
require 'funcsistema.php';
require '../topoadm.php';

$logiEditar = $_GET['id'];
//var_dump('Debug id usuário para edição  ' . $logiEditar);

//verificar  Sessão do Usuário 
if (empty($_SESSION['id'])) {

  header('location:index.php');
}

$dadosUsuario = selectUsuario($conexao, $logiEditar);
//print_r($dadosUsuario);

?>

<div class="container">

  <div class="form">
    <form class="row g-3" action="update_login.php" method="POST">
      <h5 class="text-center">Editar Informações do Usuário </h5>
      <div class="col-md-3">
        <!--Campo Hidden-->
        <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">id</label>
        <input class="form-control form-control-sm" type="text" class="form-control" id="formGroupExampleInput" name="id" value="<?php echo $dadosUsuario[0]['id']; ?> "readonly>
      </div>
      <div class="col-md-3">
        <!--Campo Hidden-->
        <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Cpf</label>
        <input class="form-control form-control-sm" type="text" class="form-control" id="formGroupExampleInput" name="cpf" value="<?php echo $dadosUsuario[0]['cpf']; ?>"readonly>
      </div>
      <div class="col-md-4">
        <label for="formGroupExampleInput" class="form-label text-capitalize text-end fw-bold ">Nome</label>
        <input class="form-control form-control-sm" type="text" class="form-control" id="formGroupExampleInput" name="nomeusuario" value="<?php echo $dadosUsuario[0]['nome']; ?>">
      </div>
      <div class="col-md-4">
        <label for="formGroupExampleInput2" class="form-label text-capitalize text-end fw-bold">E-mail</label>
        <input class="form-control form-control-sm" type="email" class="form-control" id="formGroupExampleInput2" name="email" value="<?php echo $dadosUsuario[0]['email']; ?>">
      </div>

      <div class="col-md-4">
        <label for="formGroupExampleInput2" class="form-label text-capitalize text-end fw-bold">Departamento</label>
        <select name="departamento" class="form-select" aria-label="Default select example " required>
          <option value="<?php echo $dadosUsuario[0]['departamento']; ?>"> <?php echo $dadosUsuario[0]['departamento']; ?> </option>
          <option value="Acadêmico"> Acadêmico </option>
          <option value="Administrativo"> Administrativo </option>
          <option value="Financeiro"> Financeiro </option>
          <option value="Secretaria">Secretaria</option>
          <option value="Informática">Informática</option>
        </select>


      </div>
      <div class="col-md-4">
        <label for="formGroupExampleInput2" class="form-label text-capitalize text-end fw-bold">Ativar Usuário ?</label>
        <select name="status" class="form-select" aria-label="Default select example " required>
          <option <option value="<?php echo $dadosUsuario[0]['ativo']; ?>"> <?php echo $dadosUsuario[0]['ativo']; ?> </option> ></option>
          <option value="1">S</option>
          <option value="2">N</option>

        </select>
        <i class="text-center " >Usuário  1 = Login Ativo  2 = Login Inativo</i>
      </div>
      <div class="col-md-3">
        <label for="formGroupExampleInput2" class="form-label text-capitalize text-end fw-bold">Perfil ?</label>
        <select name="perfil" class="form-select" aria-label="Default select example " required>
          <option <option value="<?php echo $dadosUsuario[0]['perfil']; ?>"> <?php echo $dadosUsuario[0]['perfil']; ?> </option> >l</option>
          <option value="1">Administrador</option>
          <option value="2">Usuário</option>
          
        </select>
        <i class="text-center " >Usuário  1 = Adm Sistema  2 = Usuário</i>

      </div>

      <div class="col-md-12">
        <input class="btn btn-danger" type="submit" value="atualizar">
      </div>
    </form>
  </div>
</div>