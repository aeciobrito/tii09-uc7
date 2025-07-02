<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../dao/ClienteDAO.php';

$dao = new ClienteDAO();
$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$inputBody = json_decode(file_get_contents('php://input'), true);

switch ($action) {
    case 'listar': // GET
        echo json_encode($dao->getAll());
        break;

    case 'buscar': // GET
        if ($id) {
            $cliente = $dao->getById($id);
            if ($cliente)
                echo json_encode($cliente);
            else {
                http_response_code(404);
                echo json_encode(["error" => "Cliente não encontrado!"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Você não informou o ID"]);
        }
        break;

    case 'cadastrar': // POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $inputBody) {
            $cli = new Cliente(null, $inputBody['nome'], $inputBody['cpf'], $inputBody['dataDeNascimento'], $inputBody['ativo']);
            if($dao->create($cli))
            {
                http_response_code(201);
                echo json_encode(['success' => 'Cliente cadastrado']);
            }
            else 
            {
                http_response_code(500);
                echo json_encode(['error' => 'Cliente não cadastrado!']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Método incorreto']);
        }
        break;

    case 'atualizar': // PUT
        if ($_SERVER['REQUEST_METHOD'] == 'PUT' && $inputBody && $id) {
            $cli = new Cliente($id, $inputBody['nome'], $inputBody['cpf'], $inputBody['dataDeNascimento'], $inputBody['ativo']);
            if($dao->update($cli))
            {
                http_response_code(204);
                echo json_encode(['success' => 'Cliente atualizado']);
            }
            else 
            {
                http_response_code(500);
                echo json_encode(['error' => 'Cliente não atualizado!']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID não fornecido, ou método incorreto']);
        }
        break;

    case 'excluir': // DELETE
        if ($id && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
            if ($dao->delete($id)) {
                echo json_encode(['message' => 'Cliente excluído!']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Erro ao excluir!']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID não fornecido ou método incorreto']);
        }
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Ação inválida, informar action']);
        break;
}

// ---------------------------------------------
// URLs de exemplo para navegação:
// http://meu_server/api/clientes_api.php
// http://meu_server/api/clientes_api.php?

// Trecho comentado com exemplo alternativo de estrutura switch
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

// Exemplo de requisição GET:
// http://localhost/minoru/tii09-uc7/09/api/clientes_api.php?action=listar&id=1

// Comentário mencionando a existência da classe Cliente que implementa JsonSerializable
// class Cliente implements JsonSerializable

// Exemplo: http://localhost/minoru/tii09-uc7/09/api/clientes_api.php?action=excluir&id=1


        // Método: POST
        // URL: http://localhost/minoru/tii09-uc7/09/api/clientes_api.php?action=cadastrar
        // Exemplo de corpo da requisição (raw → JSON):
        // {
        //     "nome": "Bruno Henrique Souza",
        //     "cpf": "234.567.890-11",
        //     "ativo": 1,
        //     "dataDeNascimento": "1990-09-30"
        // }

          // Exemplo: http://localhost/minoru/tii09-uc7/09/api/clientes_api.php?action=buscar&id=3

              // Exemplo: http://localhost/minoru/tii09-uc7/09/api/clientes_api.php?action=listar