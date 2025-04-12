<?php
require_once("../conexao.php");


$sql = "SELECT id, nome FROM pessoas";
$pessoas = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Imóvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastrar Imóvel</h1>

        <form action="salvarImoveis.php" method="POST">
            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro*</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Número*</label>
                <input type="text" name="numero" id="numero" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro*</label>
                <input type="text" name="bairro" id="bairro" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" name="complemento" id="complemento" class="form-control">
            </div>
            <div class="mb-3">
                <label for="id_contribuinte" class="form-label">Contribuinte*</label>
                <select name="id_contribuinte" id="id_contribuinte" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php while ($pessoa = $pessoas->fetch_assoc()): ?>
                        <option value="<?= $pessoa['id'] ?>"><?= $pessoa['nome'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
        </form>

        <div class="mt-3 text-center">
            <a href="../index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
