<?php
require_once("../conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE imoveis SET ativo = 0 WHERE id = $id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listarImoveis.php?mensagem=excluido");
        exit;
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
} else {
    echo "ID não informado.";
}
?>
