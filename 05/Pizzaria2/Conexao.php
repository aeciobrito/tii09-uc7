<?php

// SINGLETON
class Conexao {
    private static $bd = null;

    public static function getBd() {
    self::$bd = new PDO("mysql:host=localhost;dbname=pizzaria_senac", 'root', '');
    return self::$bd;
    }
}

?>