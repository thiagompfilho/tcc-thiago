<?php
//session_start();
include_once('mysql.php');

$pdo = conectar();

// consulta, traz dados da tabela
$sql = "SELECT * FROM tb_cidades";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// buscando todos as linhas da tabela
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de cidades cadastradas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
    

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table th {
            background-color: #343a40;
            color: #fff;
        }

        .btn-alteracao {
            background-color: #ffc107;
            color: #333;
        }

        .btn-exclusao {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body  background="img/planodefundo1.webp">
    <div class="container">
        <h2 class="text-center">Lista de cidades cadastradas</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $r) { ?>
                    <tr>
                        <td><?php echo $r['codcid']; ?></td>
                        <td><?php echo $r['nomecid']; ?></td>
                        <td> <?php echo $r['estadocid']; ?></td>
                        <td>
    <a href="cidadealt.php?id=<?php echo $r['codcid']; ?>" class="btn btn-alteracao">ALTERAÇÃO</a>
    <a href="cidadeex.php?id=<?php echo $r['codcid']; ?>" class="btn btn-exclusao">EXCLUSÃO</a>
</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="somenteadm.php" class="btn btn-secondary">Voltar</a>
        <a href="cadascidade.php" class="btn btn-primary">Cadastro de cidade</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
