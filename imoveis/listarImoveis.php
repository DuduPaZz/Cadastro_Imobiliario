<?php
require_once("../conexao.php");

$sql = "SELECT i.*, p.nome as nome_pessoa 
        FROM imoveis i 
        JOIN pessoas p ON i.id_contribuinte = p.id 
        WHERE i.ativo = 1";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Imóveis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Imóveis</h1>

    <table id="tabelaImoveis" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Complemento</th>
                <th>Proprietário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($imovel = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $imovel['id'] ?></td>
                <td><?= $imovel['logradouro'] ?></td>
                <td><?= $imovel['numero'] ?></td>
                <td><?= $imovel['bairro'] ?></td>
                <td><?= $imovel['complemento'] ?></td>
                <td><?= $imovel['nome_pessoa'] ?></td>
                <td>
                    <a href="../imoveis/editarImoveis.php?id=<?= $imovel['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="../imoveis/excluirImovel.php?id=<?= $imovel['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="text-center mt-3">
        <a href="cadastrarImoveis.php" class="btn btn-success">Cadastrar Novo Imóvel</a>
        <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
    </div>
</div>

<!-- Scripts ( data table, bootstraop) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="../estilizacao/assets/js/datatables-config.js"></script>

</body>
</html>