<?php
require_once("db_connection.php");
include("./utils/html_render.php");

$sql = "SELECT * FROM Funcionarios";
$result = mysqli_query($db_connection, $sql);
$total_workers = mysqli_num_rows($result);
date_default_timezone_set('America/Sao_Paulo');
$pattern = numfmt_create("pt_BR", NumberFormatter::CURRENCY);


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
                        $id = htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8');
                        $name = htmlspecialchars($row["nome"], ENT_QUOTES, 'UTF-8');
                        $email = htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8');
                        $role = htmlspecialchars($row["cargo"], ENT_QUOTES, 'UTF-8');
                        $wage = $row["salario"];
                        $reg_date = $row["data_registro"];

                        $formatted_wage = numfmt_format_currency($pattern, $wage, "BRL");
                        $formatted_reg_date = date("d/m/Y H:i:s", strtotime($reg_date));


                        render_worker($id, $name, $role, $email, $wage, $formatted_wage, $formatted_reg_date);
                    }
                    ?>
            </div>
        </section>
        <?php else: ?>
        <section>
            <h2>Nenhum funcionário cadastrado!</h2>
            <a href="./worker-register.php" class="link">Cadastrar o primeiro funcionário</a>
        </section>
        <?php endif ?>
        <dialog class="modal edit-modal" id="edit-modal">
            <h2>Editar um funcionário</h2>
            <form id="form" action="./edit.php" method="post">
                <input type="hidden" name="id" id="edit-id">

                <label for="name">Nome Completo</label>
                <input type="text" name="name" id="name">
                <p class="error-message" id="name-error">Preencha esse campo</p>

                <label for="role">Email</label>
                <input type="email" name="email" id="email">
                <p class="error-message" id="email-error">Adicione um endereço de email válido</p>

                <label for="email">Cargo</label>
                <input type="text" name="role" id="role">
                <p class="error-message" id="role-error">Preencha esse campo</p>

                <label for="wage">Salário</label>
                <input type="number" name="wage" id="wage" min="1" step="0.01 ">
                <p class="error-message" id="wage-error">Preencha esse campo</p>

                <div class="buttons">
                    <button type="button" class="cancel-btn">Cancelar</button>
                    <button type="submit" class="submit-edit-btn">Editar</button>
                </div>
            </form>
        </dialog>
        <dialog class="modal delete-modal" id="delete-modal">
            <h2>Tem certeza que deseja excluir esse funcionário?</h2>
            <p class="warning">Essa ação não poderá ser desfeita</p>
            <div class="buttons">
                <button type="button" class="cancel-btn">Cancelar</button>
                <button type="button" class="delete-btn">Deletar</button>
            </div>
        </dialog>
    </main>

    <script src="./js/show-modals.js"></script>
    <script src="./js/form-validation.js"></script>
    <script src="./js/fill-edit-modal.js"></script>
</body>

</html>