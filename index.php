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
    <link rel="stylesheet" href="./css/style.css">
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
        <section class="workers-section">
            <div class="section-header">
                <p class="eyebrow">Funcionários</p>
                <h1>Visualizando os <?= $total_workers ?> funcionários cadastrados</h1>
            </div>

            <div class="workers-grid">
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8');
                        $email = htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8');
                        $role = htmlspecialchars($row["cargo"], ENT_QUOTES, 'UTF-8');
                        $wage = $row["salario"];
                        $reg_date = $row["data_registro"];

                        date_default_timezone_set('America/Sao_Paulo');
                        $pattern = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

                        $formatted_wage = numfmt_format_currency($pattern, $wage, "BRL");
                        $formatted_reg_date = date("d/m/Y H:i:s", strtotime($reg_date));

                        echo "<article class='worker-card'>";
                        echo "<div class='worker-card__header'>";
                        echo "<span class='worker-badge'>Funcionário</span>";
                        echo "<h2 class='worker-name'>$name</h2>";
                        echo "</div>";
                        echo "<dl class='worker-info'>";
                        echo "<div><dt>Cargo</dt><dd>$role</dd></div>";
                        echo "<div><dt>Salário</dt><dd>$formatted_wage</dd></div>";
                        echo "<div><dt>Email</dt><dd>$email</dd></div>";
                        echo "<div><dt>Cadastro</dt><dd>$formatted_reg_date</dd></div>";
                        echo "</dl>";
                        echo "<div class='buttons'>";
                        echo "<button>Editar Funcionário</button>";
                        echo "<button>Deletar Funcionário</button>";
                        echo "</div>";
                        echo "</article>";
                    }
                    ?>
            </div>
        </section>
        <?php endif ?>
    </main>
</body>

</html>