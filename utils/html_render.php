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

function render_worker(string $name, string $role, string $email, string $formatted_wage, string $reg_date)
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
    echo "<button class='edit-btn'>Editar Funcionário</button>";
    echo "<button class='delete-btn'>Deletar Funcionário</button>";
    echo "</div>";
    echo "</article>";
}