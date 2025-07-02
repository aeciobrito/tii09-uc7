<!-- index.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>Cadastrar Produtos</h2>

    <form id="form-produto" method="get" action="">
        <div id="campos">
            <!-- Campos serão inseridos via JS -->
        </div>
        <button type="button" onclick="adicionarCampo()">Adicionar Produto</button>
        <button type="submit">Enviar</button>
    </form>

    <hr>

'    <!-- PHP --> '
    <?php
    // Função para inserir produtos no array
    function inserirProdutos($dados) {
        $produtos = [];

        if (isset($dados['nome']) && isset($dados['preco'])) {
            for ($i = 0; $i < count($dados['nome']); $i++) {
                $nome = trim($dados['nome'][$i]);
                $preco = floatval($dados['preco'][$i]);

                if (!empty($nome) && $preco > 0) {
                    $produtos[] = ["nome" => $nome, "preco" => $preco];
                }
            }
        }

        return $produtos;
    }

    // Se o formulário foi enviado
    if (!empty($_GET)) {
        $produtos = inserirProdutos($_GET);

        if (count($produtos) > 0) {
            echo "<h3>Produtos Cadastrados:</h3><ul>";
            foreach ($produtos as $p) {
                echo "<li>{$p['nome']} - R$ " . number_format($p['preco'], 2, ',', '.') . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhum produto válido foi cadastrado.</p>";
        }
    }
    ?>

    <!-- JAVASCRIPT --> 
    <script>
        let contador = 0;

        // button Adicionar Produto chama a função adicionarCampo() 
        function adicionarCampo() {
            // Essa div será usado para agrupar os campos do formulário
            const div = document.createElement("div");

            div.innerHTML = `
                <label>Produto ${contador + 1}</label><br>
                Nome: <input type="text" name="nome[]" required>
                Preço: <input type="number" name="preco[]" step="0.01" required><br><br>
            `;

            document.getElementById("campos").appendChild(div);
            contador++;
        }

        // Adiciona o primeiro campo automaticamente ao carregar
        window.onload = adicionarCampo;
    </script>
</body>
</html>
