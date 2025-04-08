<?php

$host "localhost";
$usuario "root";
$senha = "";
$banco = "cadastro_imobiliario";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao->connect_error) {
    die("Falha na conexão: ". $conexao->connect_error);
}

?>