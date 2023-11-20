<?php
session_start();
include_once('mysql.php');

$pdo = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM tb_cidades WHERE codcid = :id";

$stmc = $pdo->prepare($sql);
$stmc->bindParam(':id', $id);
$stmc->execute();

$re = $stmc->fetch(PDO::FETCH_OBJ);

/*
COMO USAR:
FETCH_ASSOC = $re['idcategoria']
FETCH_OBJ = $re->idcategoria
*/
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Alteração de Funcionários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="js/mask.js"></script>
    <style>
        .container {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button-container .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body background="img/planodefundo1.webp">
    <div class="container">
        <h2>Alteração de cidades</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nomecid">Nome da cidade</label>
                <input type="text" class="form-control" id="nomecid" name="nomecid" value="<?php echo $re->nomecid; ?>">
            </div>
            <div class="form-group">
                <label for="estadocid">Estado da cidade</label>
                <input type="text" class="form-control" id="estadocid" name="estadocid" value="<?php echo $re->estadocid; ?>">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-success" name="btnAlterar">Alterar</button>
                <button href="cidade.php" class="btn btn-success" name="btnVoltar">Voltar</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
// teste se botão foi pressionado
if (isset($_POST['btnAlterar'])) {

    //pego o valor do input (alterado ou não)
    $nomecid = $_POST['nomecid'];
    $estadocid = $_POST['estadocid'];

    //verifico se tem conteúdo
    if (empty($nomecid)) {
        echo "Necessário informar o nome da cidade";
        exit();
    }
    if (empty($estadocid)) {
        echo "Necessário informar o estado da cidade";
        exit();
    }

    //crio o sql de alteração
    $sqlup = "UPDATE tb_cidades SET nomecid = :nome, estadocid = :estado WHERE codcid = :id";

    //preparo do sql
    $stmup = $pdo->prepare($sqlup);

    // troco os parâmetros :nome e :estado
    $stmup->bindParam(':nome', $nomecid);
    $stmup->bindParam(':estado', $estadocid);
    $stmup->bindParam(':id', $id);

    //executo o sql
    if ($stmup->execute()) {
        echo "Alterado com sucesso!";
        header("Location: cidade.php");
    } else {
        echo "Erro ao alterar!";
    }
}

if (isset($_POST['btnVoltar'])) {
    header("Location: cidade.php");
}
?>
