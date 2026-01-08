<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require './adm/conexao.php';
require './adm/funcsistema.php';


if ((isset($_POST['login'])) && (isset($_POST['senha']))) {

    $loginUsuario = mysqli_real_escape_string($conexao, $_POST['login']);
    $senhaUsuario = mysqli_real_escape_string($conexao, $_POST['senha']);

    // echo 'logar';

    //Passagendo  os dados do login, como parâmetro  
    $loginUsuario = logarUsuario($conexao, $loginUsuario, $senhaUsuario);
}
