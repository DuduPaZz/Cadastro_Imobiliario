<?php
require_once("../conexao.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM pessoas WHERE id = $id";
    $resultado = $conexao->query($sql);
    $pessoa = $resultado->fetch_assoc();
} else {
    echo "ID não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Pessoa</h1>

        <form action="atualizarBancoPessoas.php" method="POST">
            <input type="hidden" name="id" value="<?= $pessoa['id'] ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome*</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= $pessoa['nome'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento*</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="<?= $pessoa['data_nascimento'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF*</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $pessoa['cpf'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo*</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="">Selecione</option>
                    <option value="M" <?= $pessoa['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                    <option value="F" <?= $pessoa['sexo'] == 'F' ? 'selected' : '' ?>>Feminino</option>
                    <option value="Outros" <?= $pessoa['sexo'] == 'Outros' ? 'selected' : '' ?>>Outros</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" value="<?= $pessoa['telefone'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $pessoa['email'] ?>">
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
        </form>

        <div class="mt-3 text-center">
            <a href="listar.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
