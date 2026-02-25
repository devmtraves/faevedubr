<?php
//Config configuração da conexão do banco usuário e informações do banco
require 'conexao.php'; 
function consultaRegistro($conexao, $id_diploma)
{

    //Deve retornar o diploma relacionado ao doc informado na tela da consulta pública
    $sqlDiploma = "SELECT * FROM  diploma where doc='$id_diploma' "; 
    $resulUsuario = mysqli_query($conexao, $sqlDiploma);

    //Aqui foi criado um array  que vou usar para guardas os dados da query
    $usuarios = array();


    while ($usuario = mysqli_fetch_assoc($resulUsuario)) {

        $usuarios[] = $usuario;
    }

    return $usuarios;
}
function consultaCertificados($conexao, $id_diploma)
{

    //Deve retornar o diploma relacionado ao doc informado na tela da consulta pública
    $sqlDiploma = "SELECT * FROM  Certificados where doc='$id_diploma' "; 
    $resulUsuario = mysqli_query($conexao, $sqlDiploma);

    //Aqui foi criado um array  que vou usar para guardas os dados da query
    $usuarios = array();


    while ($usuario = mysqli_fetch_assoc($resulUsuario)) {

        $usuarios[] = $usuario;
    }

    return $usuarios;
}