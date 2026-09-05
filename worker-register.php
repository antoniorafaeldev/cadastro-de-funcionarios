<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar um Funcionário</title>
    <link rel="stylesheet" href="./css/worker-register.css">
</head>

<body>
    <header class="header">
        <nav>
            <ul class="links">
                <li><a href="" class="link">Cadastrar Funcionário</a></li>
                <li><a href="" class="link">Visualizar Funcionários</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="register">
            <h1 class="title">Cadastrar um Funcionário</h1>
            <form action="" method="post" id="form">
                <label for="name">Nome Completo</label>
                <input class="input" type="text" name="name" id="name" required>
                <p class="error-message" id="name-error">Preencha esse nome</p>

                <label for="email">Email</label>
                <input class="input" type="email" name="email" id="email" required>
                <p class="error-message" id="email-error">Por favor, adicione um endereço de email válido</p>

                <label for="role">Cargo</label>
                <input class="input" type="text" name="role" id="role" required>
                <p class="error-message" id="role-error">Preencha este campo</p>

                <label for="wage">Salário</label>
                <input class="input" type="number" name="wage" id="wage" required>
                <p class="error-message" id="wage-error">Preencha este campo</p>

                <input class="submit" type="submit" value="Cadastrar">
            </form>
        </section>

    </main>

    <script src="./js/form-validation.js"></script>
</body>

</html>