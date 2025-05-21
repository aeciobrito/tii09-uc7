<?php

// Declaração da classe Database, que será usada para fornecer a conexão com o banco de dados
class Database
{
    // Método estático que retorna uma instância PDO para conexão com o banco
    public static function getInstance()
    {
        // Retorna um novo objeto PDO com os parâmetros de conexão:
        // - mysql: tipo do banco
        // - host=localhost: o servidor do banco está local
        // - dbname=pizzaria_senac: nome do banco de dados
        // - "root": nome do usuário
        // Sem senha (não recomendado em produção)
        return new PDO("mysql:host=localhost;dbname=pizzaria_senac", "root");
    }
}

// Bloco de teste da conexão com o banco
try {
    // Chama o método estático getInstance para obter a conexão
    $conexao = Database::getInstance();

    // Define o modo de erro do PDO para exceções (boas práticas)
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensagem de sucesso se a conexão foi bem-sucedida
    // echo "Conexão com o banco de dados realizada com sucesso!";
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem de erro
    echo "Erro na conexão: " . $e->getMessage();
}

// Referência da documentação oficial sobre abstração de banco de dados no PHP
// https://www.php.net/manual/pt_BR/refs.database.abstract.php



