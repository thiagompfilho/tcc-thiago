<?php
include_once('mysql.php');

$pdo = conectar();

$id = $_GET['id'];

$sqlc = "SELECT * FROM tb_profissionais WHERE codprof = :id";
$stmc = $pdo->prepare($sqlc);
$stmc->bindParam(':id', $id);
$stmc->execute();

if ($stmc->rowCount() > 0) {
    $sqlex = "DELETE FROM tb_profissionais WHERE codprof = $id";
    $stmex = $pdo->query($sqlex);
    echo "fumcionario excluída com sucesso!";
} else {
    echo "fumcionario não encontrada!";
}

header('Location: testefunc.php');