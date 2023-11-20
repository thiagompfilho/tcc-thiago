<?php
include_once('mysql.php');

$pdo = conectar();

$sql = "SELECT * FROM tb_servicos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Serviços Cadastrados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="js/mask.js"></script>
    <style>
        .container {
            margin-top: 50px;
        }
        .table {
            background-color: #fff;
        }
        .titulo {
            color:  #00BFFF;
            font-size: 24px;
        }
    </style>
</head>

<body background="img/planodefundo1.webp">
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr> 
                    <td class="text-center titulo" colspan="3">Tabela de Serviços</td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Código do Serviço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $r) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r['nome']); ?></td>
                        <td>R$ <?php echo number_format($r['valor'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($r['codservico']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="pga1.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</body>

</html>
