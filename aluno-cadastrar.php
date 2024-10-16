<?php
// Importa a classe Produto
require_once 'db.php';

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pdo = new PDO("mysql:host=mysql.jrcf.dev;dbname=escola", "usrapp", "010203");

    $stmt = $pdo->prepare("INSERT INTO alunos (nome, email) VALUES (:nome, :email)");
    $stmt->execute(['nome' => $nome, 'email' => $email]);

    header('location: aluno-listar.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Adicionar Novo Aluno</h2>
    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <input Type="submit" value="Salvar">
        <form>
<!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
