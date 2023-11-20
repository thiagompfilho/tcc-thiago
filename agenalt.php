<?php
session_start();
include_once('mysql.php');

$pdo = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM tb_agendas WHERE codaage = :id";

$stmc = $pdo->prepare($sql);
$stmc->bindParam(':id', $id);
$stmc->execute();

$re = $stmc->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Alteração de Agendamentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="js/mask.js"></script>
    <style>
      body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }

        .btn-back {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }
    </style>
</head>

<body background="img/planodefundo1.webp">
    <div class="container">
        <h2>Alteração de clientes</h2>
        <form method="POST">
            <div class="form-group">
                <label for="ativo">limpando a agenda</label>
                <select class="form-control" id="statusa" name="statusa">
                    <option value="A" <?php if ($re->statusa == 'A') echo 'selected'; ?>>Livre</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success" name="btnAlterar">Alterar</button>
        </form>
    </div>
</body>

</html>

<?php
// teste se botão foi pressionado
if (isset($_POST['btnAlterar'])) {
    //pego o valor do input (alterado ou não)
    $statusa = $_POST['statusa'];

    //verifico se tem conteudo
    if (empty($statusa)) {
        echo "Necessário informar o novo senha do cliente";
        exit();
    }

    //crio o sql de alteração
    $sqlup = "UPDATE tb_agendas SET statusa = :statusa, cliente = 0
             WHERE codaage = :id";

    //preparo do sql
    $stmup = $pdo->prepare($sqlup);

    // troco os parametros :statusa e :id
    $stmup->bindParam(':statusa', $statusa);
    $stmup->bindParam(':id', $id);

    //executo o sql
    if ($stmup->execute()) {
        echo "Alterado com sucesso!";
        header("Location: agendamentos.php");
    } else {
        echo "Erro ao alterar!";
    }
}
?>