<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../dao/ClienteDAO.php';

$dao = new ClienteDAO();
$action = $_GET['action'] ?? null;

switch ($action)
{
    case 'listar':
        echo json_encode($dao->getAll());
        break;

        case 'buscar':
        $id = $_GET['id'] ?? null;
        echo json_encode($dao->getById($id));
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Ação inválida, informar action']);
        break;
}

//---------------------------------------------
//  navegar 
//http://meu_server/api/clientes_api.php
//http://meu_server/api/clientes_api.php?


// switch ($action) {
//     case 'listar':
//         echo json_encode($dao->getAll());
//         break;
    
//     case 'buscar':
//         $id = $_GET['id'] ?? null;
//         echo json_encode($dao->getById($id));
//         break;

//     default:
//         http_response_code(400);
//         echo json_encode(['error' => 'Acao inválida, informar action']);
//         break;
// }

// http://localhost/minoru/tii09-uc7/09/api/clientes_api.php?action=listar&id=1

// class Cliente implements JsonSerializable