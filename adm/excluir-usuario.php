<?php
require 'funcsistema.php';

$logiEditar = $_GET['id'];

//Call Function Delete User 
deletarUsuario($conexao,$logiEditar);

