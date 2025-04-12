<?php
require_once("../conexao.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM imoveis WHERE id = $id";
    $resultado = $conexao->query($sql);
    $imoveis = $resultado->fetch_assoc();
} else {
    echo "ID não fornecido.";
    exit;
}


$pessoas = $conexao->query("SELECT id, nome FROM pessoas WHERE ativo = 1");


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Imóvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Imóvel</h1>

        <form action="atualizarBancoImoveis.php" method="POST">
            <input type="hidden" name="id" value="<?= $imoveis['id'] ?>">

            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro*</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?= $imoveis['logradouro'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Número*</label>
                <input type="number" step="0.01" name="numero" id="numero" class="form-control" value="<?= $imoveis['numero'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro*</label>
                <textarea name="bairro" id="bairro" class="form-control"><?= $imoveis['bairro'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <textarea name="complemento" id="complemento" class="form-control"><?= $imoveis['complemento'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="proprietario" class="form-label">Proprietário*</label>
                <select name="proprietario" id="proprietario" class="form-select" required>
                    <option value="" disabled <?= empty($imoveis['id_contribuinte']) ? 'selected' : '' ?>>
                        Selecione o proprietário
                    </option>
                    <?php while ($pessoa = $pessoas->fetch_assoc()): ?>
                        <option value="<?= $pessoa['id'] ?>" <?= (int)$pessoa['id'] === (int)$imoveis['id_contribuinte'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($pessoa['nome']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>



            <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
        </form>

        <div class="mt-3 text-center">
            <a href="listarImoveis.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
