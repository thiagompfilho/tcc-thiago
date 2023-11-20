<?php
//session_start();
include_once('mysql.php');

$pdo = conectar();

// consulta, traz dados da tabela
$sql = "SELECT * FROM tb_agendas WHERE  statusa = 'M'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// buscando todos as linhas da tabela
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de clientes Agendados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
        <h2 class="text-center">Lista de Horarios disponiveis</h2>
        <center><b>| Aqui você podera ver os agendamentos que foram marcados |</b></center>
        <br>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Hora</th>
                    <th>Data</th>
                    <th>Status</th>
					<th>procedimento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $r) { ?>
                    <tr>
                        <td><?php echo $r['horario']; ?></td>
                        <td><?php echo $r['dataag']; ?></td>
                        <td><?php echo $r['statusa']; ?></td>
                        <td><?php echo $r['procedimento']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="somentefuncionario.php" class="btn btn-secondary">Voltar</a>
    </div>
</body>

</html>
