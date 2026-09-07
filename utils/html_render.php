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