<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar um Funcionário</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="">Cadastrar Funcionário</a></li>
                <li><a href="">Visualizar Funcionários</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Cadastrar um Funcionário</h1>
        <form action="" method="post">
            <label for="">Nome Completo</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="role">Cargo</label>
            <input type="text" name="role" id="role" required>

            <label for="wage">Salário</label>
            <input type="number" name="wage" id="wage" required>

            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>

</html>