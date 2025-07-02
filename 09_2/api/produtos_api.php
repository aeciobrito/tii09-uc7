<?php
// Para funcionar com o frontend
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}
// (Acima) Para funcionar com o frontend

require_once __DIR__ . '/../dao/ProdutoDAO.php';


$dao = new ProdutoDAO();
$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$inputBody = json_decode(file_get_contents('php://input'), true);

switch ($action) {
    case 'listar': // GET
        echo json_encode($dao->getAll());
        break;

    case 'buscar': // GET
        if ($id) {
            $produto = $dao->getById($id);
            if ($produto)
                echo json_encode($produto);
            else {
                http_response_code(404);
                echo json_encode(["error" => "Produto não encontrado!"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Você não informou o ID"]);
        }
        break;

    case 'cadastrar': // POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $inputBody) {
            $prd = new Produto(null, $inputBody['nome'], $inputBody['preco'], $inputBody['ativo'], $inputBody['dataDeCadastro'], $inputBody['dataDeValidade']);
            if($dao->create($prd))
            {
                http_response_code(201);
                echo json_encode(['success' => 'Produto cadastrado']);
            }
            else 
            {
                http_response_code(500);
                echo json_encode(['error' => 'Produto não cadastrado!']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Método incorreto']);
        }
        break;

    case 'atualizar': // PUT
        if ($_SERVER['REQUEST_METHOD'] == 'PUT' && $inputBody && $id) {
            $prd = new Produto($id, $inputBody['nome'], $inputBody['preco'], $inputBody['ativo'], $inputBody['dataDeCadastro'], $inputBody['dataDeValidade']);
            if($dao->update($prd))
            {
                http_response_code(204);
                echo json_encode(['success' => 'Produto atualizado']);
            }
            else 
            {
                http_response_code(500);
                echo json_encode(['error' => 'Produto não atualizado!']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID não fornecido, ou método incorreto']);
        }
        break;

    case 'excluir': // DELETE
        if ($id && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
            if ($dao->delete($id)) {
                echo json_encode(['message' => 'Produto excluído!']);
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


