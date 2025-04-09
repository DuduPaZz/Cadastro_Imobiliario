<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pessoa</title>
</head>
<body>

    <form action="salvar.php" method="POST">
        <label>Nome*: <input Type="text" name="nome_pessoas" required></label><br><br>
        <label>Data de Nascimento*: <input Type="date" name="data_nascimento" required></label><br><br>
        <label>CPF*: <input Type="text" name="cpf_pessoas" required></label><br><br>
        <label>Sexo*:
            <select name="sexo" required>
                <option value="">Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="Outro">Outros sexos</option>
            </select>
        </label><br><br>
        <label>Telefone: <input Type="text" name="telefone" required></label><br><br>
        <label>Email: <input Type="text" name="email" required></label><br><br>

        <input type="submit" value="Cadastrar" href="../index.php">

    </form>
    
    <p><a href="../index.php">Voltar</a></p>
                

</body>
</html>