<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Exportar para JSON</title>
</head>
<body>
  <h2>Formulário de Usuário</h2>
  <form id="userForm">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <button type="button" onclick="exportarJSON()">Exportar JSON</button>
  </form>

  <h3>Resultado:</h3>
  <pre id="resultado"></pre>

  <script>
    function exportarJSON() {
      const form = document.getElementById('userForm');
      const dados = {
        nome: form.nome.value,
        email: form.email.value
      };

      const json = JSON.stringify(dados, null, 2); // formata com identação
      document.getElementById('resultado').textContent = json;

      // Para download do arquivo JSON
      const blob = new Blob([json], { type: "application/json" });
      const link = document.createElement("a");
      link.href = URL.createObjectURL(blob);
      link.download = "dados.json";
      link.click();
    }
  </script>
</body>
</html>
