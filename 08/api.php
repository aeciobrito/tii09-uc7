<?php

// echo json_encode('Olá mundo');

header('Content-Type: application/json');

// $data = [
//     'nome' => 'Minoru',
//     'idade' => 25,
//     'cidade' => 'São Paulo'
// ];

// echo json_encode($data, JSON_PRETTY_PRINT);

// $data1 = [
//     'Hi'
// ];

// echo json_encode($data1, JSON_PRETTY_PRINT);

// Simulação de Dados
$pessoas = [
    ['id' => 1, 'nome' => 'João'],
    ['id' => 2, 'nome' => 'Maria'],
    ['id' => 3, 'nome' => 'José'],
];


$rota = $_GET['rota'] ?? '';

$metodo = $_SERVER['REQUEST_METHOD'];

// echo json_encode("Olá cliente, vc acesscou com o método " . $metodo);

if($metodo == 'GET' && $rota == 'ola') {
    echo json_encode(['mensagem' => "Olá Mundo"]);
    exit;
}

if ($metodo == 'GET' && $rota == 'ola-nome') {
    $nome = $_GET['nome'] ?? 'Visitante';
    echo json_encode(['mensagem' => "Olá, $nome"]);
    exit;
}

if ($metodo = 'GET' && $rota = 'pessoas'){
    echo json_encode($pessoas);
    exit;
}

?>
