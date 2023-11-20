<?php
include 'mysql.php';
include 'funcaoData.php'; 

$pdo = conectar();

$d = $_POST['dia'];
$p = $_POST['procedimento'];

$sql = "SELECT * FROM tb_agendas WHERE dataag =:d and procedimento = :p AND cliente = 0 and statusa = 'A'";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":d", $d);
$stmt->bindValue(":p", $p);
$stmt->execute(); 
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $v) {
	echo "<option value=".$v['codaage']. ">".$v['horario']."</option>";
}