<?php
require_once("./db_connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        echo "form foi enviado";

    $id = $_POST["id"] ?? "";
    $name = trim($_POST["name"]) ?? "";
    $email = trim($_POST["email"]) ?? "";
    $role = trim($_POST["role"]) ?? "";
    $wage = (float) ($_POST["wage"] ?? 1);

    $sql = "UPDATE Funcionarios 
            SET nome = ?, email = ?, cargo = ?, salario = ?
            WHERE id = ?
            ";

    $statement = mysqli_prepare($db_connection, $sql);

    mysqli_stmt_bind_param(
        $statement,
        "sssdi",
        $name,
        $email,
        $role,
        $wage,
        $id
    );

    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);
    } catch (mysqli_sql_exception ){
        echo "Erro ao cadastrar funcionário.";
    }
    
}