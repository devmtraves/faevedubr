<?php
session_start();
require 'conexao.php';

require 'funcsistema.php';


$removeDiploma = $_GET['id'];

$remov = deletDiploma($conexao,$removeDiploma);

?>