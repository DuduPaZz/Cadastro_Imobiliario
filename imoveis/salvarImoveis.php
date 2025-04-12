<?php
require_once("../conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $complemento = $_POST["complemento"] ?? null; // este campo é opcional, entao aceita null
    $id_contribuinte = $_POST["id_contribuinte"];

    $stmt = $conexao->prepare("INSERT INTO imoveis (logradouro, numero, bairro, complemento, id_contribuinte)
                               VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $logradouro, $numero, $bairro, $complemento, $id_contribuinte);

    if ($stmt->execute()) {
        echo "<h3>Imóvel cadastrado com sucesso!</h3>";
        echo '<p><a href="cadastrarImoveis.php">Cadastrar outro imóvel</a></p>';
        echo '<p><a href="listarImoveis.php">Ver lista de imóveis</a></p>';
    } else {
        echo "Erro ao cadastrar imóvel: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Acesso inválido.";
}
?>
