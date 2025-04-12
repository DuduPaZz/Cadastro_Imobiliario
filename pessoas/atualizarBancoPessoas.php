<?php
require_once("../conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "UPDATE pessoas SET 
            nome = '$nome', 
            data_nascimento = '$data_nascimento', 
            cpf = '$cpf', 
            sexo = '$sexo', 
            telefone = '$telefone', 
            email = '$email' 
            WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
        exit();
    } else {

        echo "Erro ao atualizar dados: " . $conexao->error;
    }
} else {
    echo "Dados não recebidos corretamente.";
}
?>