<?php

class Database
{
    public static function getInstance()
    {
        return new PDO("mysql:host=localhost;dbname=pizzaria_senac", "root");
    }
}

//  teste para chamar e verificar se está correto 

//  https://www.php.net/manual/pt_BR/refs.database.abstract.php

