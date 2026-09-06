<?php 
require_once("config.php");

try {
    $db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
} catch (mysqli_sql_exception) {
    echo "<h1> Erro durante a conexão com o Banco de Dados </h1>";
}