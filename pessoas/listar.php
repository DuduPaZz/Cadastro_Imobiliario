<?php
require_once("../conexao.php");

$sql = "SELECT * FROM pessoas";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas</title>
</head>
<body>

    <h1>Lista de Pessoas Cadastradas</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>Sexo</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php while($pessoa = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $pessoa['id'] ?></td>
            <td><?= $pessoa['nome'] ?></td>
            <td><?= $pessoa['data_nascimento'] ?></td>
            <td><?= $pessoa['cpf'] ?></td>
            <td><?= $pessoa['sexo'] ?></td>
            <td><?= $pessoa['telefone'] ?></td>
            <td><?= $pessoa['email'] ?></td>
            <td>
                <a href="editar.php?id=<?= $pessoa['id'] ?>">Editar</a> |
                <a href="excluir.php?id=<?= $pessoa['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>

    <p><a href="cadastrar.php">Cadastrar Nova Pessoa</a></p>
    <p><a href="../index.php">Voltar ao Início</a></p>

</body>
</html>
