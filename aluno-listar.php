<?php
include 'db.php';
$pdo = new PDO("mysql:host=mysql.jrcf.dev;dbname=escola", "usrapp", "010203");
$query = $pdo->query("SELECT * FROM alunos");
$alunos = $query->fetchALL(PDO::FETCH_ASSOC);
?>

<h2>Lista de alunos</h2>
<a href="aluno-cadastrar.php">Adicionar Novo Aluno</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
</tr>
<?php foreach ($alunos as $aluno) : ?>
    <tr>
        <td><?php echo $aluno['id']; ?></td>
        <td><?php echo $aluno['nome']; ?></td>
        <td><?php echo $aluno['email']; ?></td>
        <td>
            <a href="editar_aluno.php?id=<?php echo $aluno['id']; ?>">Editar</a>
            <a href="excluir_aluno.php?id=<?php echo $aluno['id']; ?>">Excluir</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>