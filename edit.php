<?php
require_once("./db_connection.php");
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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

        $_SESSION["success_message"] = "Funcionário editado com sucesso!";
        header("Location: ./index.php");
        exit;
    } catch (mysqli_sql_exception) {
        
        $_SESSION["error_message"] = "Erro ao editar funcionário!";
        header("Location: ./index.php");
        exit;
    }
}