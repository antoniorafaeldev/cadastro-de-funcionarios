<?php
session_start();
require_once("./db_connection.php");

$id = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $id = $_POST["delete-id"] ?? 0;
        echo $id;

        $sql = "DELETE FROM Funcionarios
                WHERE id = ?
        ";

        $statement = mysqli_prepare($db_connection, $sql);

        mysqli_stmt_bind_param(
            $statement,
            "i",
            $id
        );

        mysqli_stmt_execute($statement);

        mysqli_stmt_close($statement);

        $_SESSION["success_message"] = "Funcionário apagado com sucesso!";
        header("Location: ./index.php");
    } catch (mysqli_sql_exception) {

        $_SESSION["error_message"] = "Erro ao apagar funcionário!";
        header("Location: ./index.php");
    }
}