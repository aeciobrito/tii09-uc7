<!--
PHP + HTML

Crie um formulário que permita cadastrar até 3 produtos (nome e preço)
Use funções para:
- Inserir os produtos no array
- Listar os produtos cadastrados
- Calcular a média dos preços
-->

<!-- index.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>Cadastrar Produtos</h2>

    <form id="form-produto" method="post" action="">
        <div id="campos">
            <!-- Campos serão inseridos via JS -->
        </div>
        <button type="button" onclick="adicionarCampo()">Adicionar Produto</button>
        <button type="submit">Enviar</button>
    </form>

    <hr>

    <?php
    // Função para inserir produtos no array
    function inserirProdutos($dados) {
        $produtos = [];
        for ($i = 0; $i < count($dados['nome']); $i++) {
            $nome = $dados['nome'][$i];
            $preco = floatval($dados['preco'][$i]);
            if (!empty($nome) && $preco > 0) {
                $produtos[] = ["nome" => $nome, "preco" => $preco];
            }
        }
        return $produtos;
    }

    // Função para listar produtos
    function listarProdutos($produtos) {
        echo "<h3>Produtos Cadastrados:</h3><ul>";
        foreach ($produtos as $p) {
            echo "<li>{$p['nome']} - R$ " . number_format($p['preco'], 2, ',', '.') . "</li>";
        }
        echo "</ul>";
    }

    // Função para calcular a média
    function calcularMedia($produtos) {
        if (count($produtos) === 0) return 0;
        $soma = 0;
        foreach ($produtos as $p) {
            $soma += $p['preco'];
        }
        return $soma / count($produtos);
    }

    // Lógica de execução se o formulário for enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $produtos = inserirProdutos($_POST);
        listarProdutos($produtos);
        $media = calcularMedia($produtos);
        echo "<p><strong>Média de preços:</strong> R$ " . number_format($media, 2, ',', '.') . "</p>";
    }
    ?>

    <script>
        let contador = 0;

        function adicionarCampo() {
            if (contador >= 3) {
                alert("Limite de 3 produtos atingido!");
                return;
            }

            const div = document.createElement("div");
            div.innerHTML = `
                <label>Produto ${contador + 1}</label><br>
                Nome: <input type="text" name="nome[]">
                Preço: <input type="number" name="preco[]" step="0.01"><br><br>
            `;
            document.getElementById("campos").appendChild(div);
            contador++;
        }

        // Adiciona o primeiro campo automaticamente
        window.onload = adicionarCampo;
    </script>
</body>
</html>
