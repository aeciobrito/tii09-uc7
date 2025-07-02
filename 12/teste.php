<?php
// Define a classe Cidade com um atributo do tipo Estado
class Cidade {
    public $id;
    public $nome;
    public Estado $estado; // Declaração de tipo exige a propriedade ser inicializada

    // Construtor com o parâmetro adicional do tipo Estado
    function __construct($id, $nome, Estado $estado)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->estado = $estado;
    }
}

// Define a classe Estado com ID e sigla (UF)
class Estado {
    public $id;
    public $uf;

    function __construct($id, $uf)
    {
        $this->id = $id;
        $this->uf = $uf;
    }
}

// Criação de objetos Estado
$bahia = new Estado(17, 'BA');
$minas = new Estado(22, 'MG');

// Criação de objetos Cidade, associando o Estado correspondente
$salvador = new Cidade(1, 'Salvador', $bahia);
$bh = new Cidade(2, 'Belo Horizonte', $minas);

// Impressão para visualizar os objetos
print_r($salvador);
print_r($bh);
