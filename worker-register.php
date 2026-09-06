<?php
require_once("db_connection.php");

$name = $email = $role = $wage = '';
$errors = [];
$status = ($_GET["success"] ?? "") === "1" ? "success" : "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $role = trim($_POST["role"] ?? '');
    $wage = (float) ($_POST["wage"] ?? 1);

    if (empty($name) || empty($role) || $wage <= 0) {
        $errors["general"] = "Preencha esse campo";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Adicione um endereço de email válido";
    } else {
        try {
            $sql = "INSERT INTO Funcionarios (nome, email, cargo, salario) VALUES (?, ?, ?, ?)";

            $statement = mysqli_prepare($db_connection, $sql);
            mysqli_stmt_bind_param(
                $statement,
                "sssd",
                $name,
                $email,
                $role,
                $wage
            );

            if (!mysqli_stmt_execute($statement)) {
                mysqli_stmt_close($statement);
                $errors["general"] = "Erro ao cadastrar funcionário.";

                $status = "error";
            } else {

                mysqli_stmt_close($statement);

                $status = "success";
                header("Location: " . $_SERVER['SCRIPT_NAME'] . "?success=1");
                exit;
            }
        } catch (mysqli_sql_exception) {
            $errors["general"] = "Erro ao se conectar com o banco de dados";
            $status = "error";
        }
    }
}

function show_message(string $type)
{
    if ($type === "success") {
        echo "<div>";
        echo "<h2>Funcionário cadastrado com sucesso!</h2>";
        echo "</div>";
    } else {
        echo "<div>";
        echo "<h2>Erro ao cadastrar funcionário</h2>";
        echo "</div>";
    }
}

?>
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
        <?php
        if ($status !== "") {
            $status === "success" ? show_message("success") : show_message("error");
        }

        ?>
        <section class="register">
            <h1 class="title">Cadastrar um Funcionário</h1>
            <form action="" method="post" id="form">
                <label for="name">Nome Completo</label>
                <input class="input" type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" required>
                <p class="error-message <?= !empty($errors["general"]) ? 'active' : '' ?>" id="name-error">
                    <?= !empty($errors["general"]) ? htmlspecialchars($errors["general"]) : "Preencha esse
                    campo" ?></p>


                <label for="email">Email</label>
                <input class="input" type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>"
                    required>
                <p class="error-message <?= !empty($errors["email"]) ? 'active' : '' ?>" id="email-error">
                    <?= !empty($errors["email"]) ? htmlspecialchars($errors["email"]) : "Por favor,
                    adicione um
                    endereço de email
                    válido" ?>
                </p>

                <label for="role">Cargo</label>
                <input class="input" type="text" name="role" id="role" value="<?= htmlspecialchars($role) ?>" required>
                <p class="error-message <?= !empty($errors["general"]) ? 'active' : '' ?>" id="role-error"><?= !empty($errors["general"]) ? htmlspecialchars($errors["general"]) : "Preencha esse
                    campo" ?></p>

                <label for="wage">Salário</label>
                <input class="input" type="number" name="wage" id="wage" value="<?= htmlspecialchars($wage) ?>" required
                    min="1" step="0.01">
                <p class="error-message <?= !empty($errors["general"]) ? 'active' : '' ?>" id="wage-error"><?= !empty($errors["general"]) ? htmlspecialchars($errors["general"]) : "Preencha esse
                    campo" ?></p>

                <input class="submit" type="submit" value="Cadastrar">
            </form>
        </section>

    </main>

    <script src="./js/form-validation.js"></script>
</body>

</html>