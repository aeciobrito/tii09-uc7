<?php
class Database
{
    public static function getInstance()
    {
        return new PDO("mysql:host=localhost;dbname=venda", "root", "");
    }
}

// echo 'Funciona';

// Obtém uma instância do banco de dados através do método estático getInstance() da classe Database.
// Isso normalmente implementa o padrão Singleton, garantindo que apenas uma instância da conexão com o banco seja usada.
$variavelQualquer = Database::getInstance();

// Aqui, também é obtida a instância do banco de dados e atribuída à variável $db.
// Funcionalmente é o mesmo que a linha anterior, mas com outro nome de variável.
$db = Database::getInstance();

// Executa uma consulta SQL diretamente na instância retornada por getInstance()
// A função query("select * from produtos") executa um SELECT que retorna todos os registros da tabela 'produtos'
// O resultado da consulta é impresso usando print_r(), útil para depuração.

// print_r(Database::getInstance()->query("select * from produtos"));

?>

