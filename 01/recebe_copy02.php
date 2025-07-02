<!-- index.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Produto</title>
</head>
<body>
    <h2>Calculadora de Total de Produto</h2>
    <form method="get" action="">
        <label for="produto">Produto:</label>
        <input type="text" name="produto" id="produto" required><br><br>

        <label for="preco">Preço (R$):</label>
        <input type="number" step="0.01" name="preco" id="preco" required><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" required><br><br>

        <input type="submit" value="Calcular Total">
    </form>

    <?php
    // Executa apenas se todos os parâmetros forem recebidos
    if (isset($_GET['produto'], $_GET['preco'], $_GET['quantidade'])) {
        $produto = htmlspecialchars($_GET['produto']);
        $preco = floatval($_GET['preco']);
        $quantidade = intval($_GET['quantidade']);

        // Validação básica
        if ($preco >= 0 && $quantidade > 0) {
            function calcularTotal($preco, $quantidade) {
                return $preco * $quantidade;
            }

            $total = calcularTotal($preco, $quantidade);

            echo "<hr>";
            echo "<p><strong>Produto:</strong> $produto</p>";
            echo "<p><strong>Quantidade:</strong> $quantidade</p>";
            echo "<p><strong>Preço unitário:</strong> R$ " . number_format($preco, 2, ',', '.') . "</p>";
            echo "<p><strong>Total:</strong> R$ " . number_format($total, 2, ',', '.') . "</p>";
        } else {
            echo "<p style='color:red;'>Por favor, insira valores válidos para preço e quantidade.</p>";
        }
    }
    ?>
</body>
</html>
