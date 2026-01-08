<?php
session_start();
require 'adm/conexao.php';

require 'adm/funcsistema.php';



 $cpf =$_POST['cpf'];
 $nome = $_POST['nomeusuario'];
 $email = $_POST['email'];
 $departamento = $_POST['departamento'];
 $stausUsuario = $_POST['status'];
 $perfil = $_POST['perfil'];
 $senha= $_POST['senha'];

 
 //Aqui a função é chamada para executar o cadastrado do usuáruio novo   
 $cadastrarUsuario = cadUsuario($conexao,$cpf,$nome,$email,$departamento,$stausUsuario,$perfil,$senha);


 

?>