<?php

require_once 'Database.php';
require_once 'Contato.php';

class ContatoDAO
{
    private $db; // usado em todas as funções

    public function __construct()
    {
        $this->db = Database::getInstance();        
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM contatos");
        $contatos = []; // inicializa um array vazio

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $contatos[] = new Contato($row['id'], $row['nome']);
        }

        return $contatos;
    }

    public function create(Contato $contato) 
    {
        $sql = "INSERT INTO contatos (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($sql);

        $nome = $contato->getNome();

        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
    }
}


// PDOStatement ou stmt representa uma consulta preparada que pode ser executada no banco de dados. Ele permite interagir com o banco de forma segura e eficiente.


// TESTE DE CLASSE
// $cont1 = new Contato(null, "Batman");
// $dao = new ContatoDAO();

// $dao->create($cont1);

// // TESTE DE CLASSE
// $cont1 = new Contato(null, "Batman02");
// $dao = new ContatoDAO();

// $dao->create($cont1);

// $dao = new ContatoDAO();
// print_r($dao->getAll()); 
?>


