<?php
require_once("db_connection.php");

$sql = "SELECT * FROM Funcionarios";
$result = mysqli_query($db_connection, $sql);
$total_workers = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Funcionários</title>
    <link rel="stylesheet" href="./css/shared.css">
</head>

<body>
    <header class="header">
        <nav>
            <ul class="links">
                <li><a href="./worker-register.php" class="link">Cadastrar Funcionário</a></li>
                <li><a href="#" class="link">Visualizar Funcionários</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php if ($total_workers > 0): ?>
        <section>
            <h1>Visualizando os <?= $total_workers ?> funcionários cadastrados </h1>

            <div>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id =  $row["id"];
                        $name = $row["nome"];
                        $email = $row["email"];
                        $role = $row["cargo"];
                        $wage = $row["salario"];
                        $reg_date = $row["data_registro"];

                        date_default_timezone_set('America/Sao_Paulo');
                        $pattern = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

                        $formatted_wage = numfmt_format_currency($pattern, $wage, "BRL");
                        $formatted_reg_date = date("d/m/Y H:i:s", strtotime($reg_date));

                        echo "<h2>$name</h2>";
                        echo "<p>Cargo: $role</p>";
                        echo "<p>Salário: $formatted_wage</p>";
                        echo "<p>Email: $email</p>";
                        echo "<p>Data de Cadastro: $formatted_reg_date</p>";
                    }
                    ?>
            </div>
        </section>
        <?php endif ?>
    </main>
</body>

</html>