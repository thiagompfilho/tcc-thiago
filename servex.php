<?php
include_once('mysql.php');

$pdo = conectar();

$id = $_GET['id'];

$sqlc = "SELECT * FROM tb_servicos WHERE codservico = :id";
$stmc = $pdo->prepare($sqlc);
$stmc->bindParam(':id', $id);
$stmc->execute();

if ($stmc->rowCount() > 0) {
    $sqlex = "DELETE FROM tb_servicos WHERE codservico = $id";
    $stmex = $pdo->query($sqlex);
    echo "serviço excluída com sucesso!";
} else {
    echo "serviço não econtrado";
}

header('Location: servicos.php');