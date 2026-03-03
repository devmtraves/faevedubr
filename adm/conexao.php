<?php


 $servidor="acadfaev.mysql.dbaas.com.br";
 $usuario="acadfaev";
 $senha="Acad@faev2025";
 $banco="acadfaev";

//$servidor="localhost";
//$usuario="root";
//$senha="";
//$banco="faev";

//Conectando com o servidor
$conexao = mysqli_connect($servidor , $usuario , $senha , $banco);

    //var_dump($conexao);

if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
    


    // mysqli_set_charset($conexao, "utf8");
     
} 



?>