<?php
include_once('mysql.php');

$pdo = conectar();

$id = $_GET['id'];

$sqlc = "SELECT * FROM tb_clientes WHERE codcli = :id";
$stmc = $pdo->prepare($sqlc);
$stmc->bindParam(':id', $id);
$stmc->execute();

if ($stmc->rowCount() > 0) {
    $sqlex = "DELETE FROM tb_clientes WHERE codcli = $id";
    $stmex = $pdo->query($sqlex);
    echo "cliente excluída com sucesso!";
} else {
    echo "cliente não encontrada!";
}

header('Location: teste.php');