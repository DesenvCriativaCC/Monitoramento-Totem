<?php 

$host = "localhost"; // nome do servidor MySQL
$user = "root"; // nome de usuário do MySQL
$senha = ""; // senha do MySQL
$banco = "test"; // nome do banco de dados

// conexão com o banco de dados MySQL usando PDO
try {
    $conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem sucedida";
} catch (PDOException $e) {
    echo "Não foi possível conectar ao MySQL: " . $e->getMessage();
}
