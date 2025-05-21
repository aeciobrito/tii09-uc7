<?php

// SINGLETON - https://refactoring.guru/design-patterns/singleton
class Conexao {
    private static $bd = null;

    public static function getBd() {
        // return new PDO("mysql:host=localhost;dbname=pizzaria_senac", 'root', '');

        if(self::$bd === null) {
            self::$bd = new PDO("mysql:host=localhost;dbname=pizzaria_senac", 'root', '');            
        }

        return self::$bd;
    }
}
?>