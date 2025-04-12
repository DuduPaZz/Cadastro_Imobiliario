<?php
require_once("../conexao.php");

$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'] ?? null;
$email = $_POST['email'] ?? null;


$sql = "INSERT INTO pessoas (nome, data_nascimento, cpf, sexo, telefone, email)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssssss", $nome, $data_nascimento, $cpf, $sexo, $telefone, $email);


if ($stmt->execute()) {
    echo "Pessoa cadastrada com sucesso!<br>";
    echo '<a href="listar.php">Ver lista de pessoas</a><br>';
    echo '<a href="cadastrar.php">Cadastrar outra pessoa</a>';
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$conexao->close();
?>
