<?php
include 'db.php';

$id = $_GET['id'];
$pdo = new PDO("mysql:host=mysql.jrcf.dev;dbname=escola", "usrapp", "010203");
$stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = :id");
$stmt-> execute(['id' => $id]);
$aluno = $stmt->fetch(PDO :: FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    $stmt = $pdo->prepare("UPDATE alunos SET nome = :nome, email = :email WHERE id = :id");
    $stmt->execute(['nome' => $nome, 'email' => $email, 'id' => $id]);

    header('Location: aluno-listar.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>Editar Aluno</h2>
<form method="POST" action="">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required>
    <br>
    <label>Email:<label>
    <input type="email" name="email" value="<?php echo $aluno['email']; ?>" required>
    <br>
    <input type="submit" value="Salvar">
</form>
<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>