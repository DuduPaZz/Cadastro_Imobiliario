<?php
require_once("../conexao.php");

$sql = "SELECT * FROM pessoas WHERE ativo = 1";
$resultado = $conexao->query($sql);


if (isset($_GET['mensagem']) && $_GET['mensagem'] === 'excluido'): ?>
    <div class="alert alert-success text-center">
        Pessoa excluída com sucesso!
    </div>
<?php endif; 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Pessoas</h1>

    <table id="tabelaPessoas" class="table table-bordered table-striped">
        <thead>
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
        </thead>
        <tbody>
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
                    <a href="../pessoas/editarPessoa.php?id=<?= $pessoa['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="../pessoas/excluirCadastroPessoa.php?id=<?= $pessoa['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="text-center mt-3">
        <a href="cadastrar.php" class="btn btn-success">Cadastrar Nova Pessoa</a>
        <a href="../index.php" class="btn btn-secondary">Voltar ao Início</a>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="../estilizacao/assets/js/datatables-config.js"></script>

</body>
</html>
