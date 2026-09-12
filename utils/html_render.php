<?php


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

function render_worker(int $id, string $name, string $role, string $email, float $wage, string $formatted_wage, string $reg_date)
{



    echo "<article class='worker-card'>";
    echo "<div class='worker-card__header'>";
    echo "<span class='worker-badge'>Funcionário</span>";
    echo "<h2 class='worker-name'>$name</h2>";
    echo "</div>";
    echo "<dl class='worker-info'>";
    echo "<div><dt>Cargo</dt><dd>$role</dd></div>";
    echo "<div><dt>Salário</dt><dd>$formatted_wage</dd></div>";
    echo "<div><dt>Email</dt><dd>$email</dd></div>";
    echo "<div><dt>Cadastro</dt><dd>$reg_date</dd></div>";
    echo "</dl>";
    echo "<div class='buttons'>";
    echo "<button class='edit-btn'
        data-id='" . htmlspecialchars($id, ENT_QUOTES) . "'
        data-name='" . htmlspecialchars($name, ENT_QUOTES) . "'
        data-role='" . htmlspecialchars($role, ENT_QUOTES) . "'
        data-email='" . htmlspecialchars($email, ENT_QUOTES) . "'
        data-wage='" . htmlspecialchars($wage, ENT_QUOTES) . "'

    >";
    echo "Editar Funcionário";
    echo "</button>";
    echo "<button class='delete-btn' 
        data-id='" . htmlspecialchars($id, ENT_QUOTES) . "'>
        Deletar Funcionário
        </button>";
    echo "</div>";
    echo "</article>";
}