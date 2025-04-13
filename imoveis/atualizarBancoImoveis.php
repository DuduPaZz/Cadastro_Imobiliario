<?php
require_once("../conexao.php");

if (isset($_POST['id'], $_POST['logradouro'], $_POST['numero'])) {
    $id = (int)$_POST['id'];
    $logradouro = $_POST['logradouro'];
    $numero = (int)$_POST['numero'];
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
    $proprietario = isset($_POST['proprietario']) ? (int)$_POST['proprietario'] : null;

    $sql = "UPDATE imoveis 
            SET logradouro = ?, 
                numero = ?, 
                bairro = ?, 
                complemento = ?, 
                id_contribuinte = ?
            WHERE id = ?";
    
    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        echo "Erro na preparação da query: " . $conexao->error;
        exit;
    }

    $stmt->bind_param("sissii", $logradouro, $numero, $bairro, $complemento, $proprietario, $id);

    if ($stmt->execute()) {
        header("Location: listarImoveis.php?sucesso=1");
        exit;
    } else {
        echo "Erro ao atualizar o imóvel: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Dados incompletos.";
}
