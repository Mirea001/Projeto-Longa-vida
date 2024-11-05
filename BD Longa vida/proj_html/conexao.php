<?php
// Conexão com o banco de dados (substitua pelos seus dados)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Banco_Agencia";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    // Insere os dados no banco
    $sql = "INSERT INTO cadastro (numero, descricao, valor) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ids", $numero, $descricao, $valor);
    $stmt->execute();

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        echo "Novo registro criado com sucesso!";
    } else {
        echo "Erro ao criar registro";
    }

    // ... (código de conexão com o banco de dados)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inserção (como no exemplo anterior)
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $acao = $_GET['acao'];
    $id = $_GET['id']; // Supondo que o ID seja passado como parâmetro GET

    if ($acao == 'consultar') {
        // Consulta o registro pelo ID
        $sql = "SELECT * FROM cadastro WHERE id = ?";
        // ... (executa a consulta e retorna os dados)
    } else if ($acao == 'alterar') {
        // Atualiza o registro pelo ID
        $novo_numero = $_GET['novo_numero'];
        $nova_descricao = $_GET['nova_descricao'];
        $novo_valor = $_GET['novo_valor'];
        $sql = "UPDATE cadastro SET numero = ?, descricao = ?, valor = ? WHERE id = ?";
        // ... (executa a consulta)
    } else if ($acao == 'excluir') {
        // Exclui o registro pelo ID
        $sql = "DELETE FROM cadastro WHERE id = ?";
        // ... (executa a consulta)
    }
}

    $stmt->close();
}

$conn->close();
?>