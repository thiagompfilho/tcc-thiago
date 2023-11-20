<?php
session_start();
include_once('mysql.php');

$pdo = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM tb_servicos WHERE codservico = :id";

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
    <title>Alteração de Serviços</title>
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
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body background="img/planodefundo1.webp">
    <div class="container">
        <h2>Alteração de Serviços</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome do serviço</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $re->nome; ?>">
            </div>
            <div class="form-group">
                <label for="valor">Valor do serviço</label>
                <input class="form-control money" type="text" id="valor" name="valor" value="<?php echo $re->valor; ?>">
            </div>
            <div class="form-group">
                <label for="ativo">Está ativo</label>
                <select class="form-control" id="ativo" name="ativo">
                    <option value="S" <?php if ($re->ativo == 'S') echo 'selected'; ?>>Sim</option>
                    <option value="N" <?php if ($re->ativo == 'N') echo 'selected'; ?>>Não</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success" name="btnAlterar">Alterar</button>
            <button type="submit" class="btn btn-success" name="btnAlterar">Voltar</button>
        </form>
    </div>
</body>

</html>
<?php
// teste se botão foi pressionado
if (isset($_POST['btnAlterar'])) {

    //pego o valor do input (alterado ou não)
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $ativo = $_POST['ativo'];

    //verifico se tem conteúdo 
    if (empty($nome)) {
        echo "Necessário informar o novo nome do serviço";
        exit();
    }
    if (empty($valor)) {
        echo "Necessário informar o novo valor do serviço";
        exit();
    }
    if (empty($ativo)) {
        echo "Necessário informar se o serviço está ativo";
        exit();
    }

    //crio o sql de alteração
    $sqlup = "UPDATE tb_servicos SET nome = :nome, valor = :valor, ativo = :ativo
             WHERE codservico = :id";

    //preparo do sql
    $stmup = $pdo->prepare($sqlup);

    // troco os parâmetros :nome, :valor, :ativo e :id
    $stmup->bindParam(':nome', $nome);
    $stmup->bindParam(':valor', $valor);
    $stmup->bindParam(':ativo', $ativo);
    $stmup->bindParam(':id', $id);

    //executo o sql
    if ($stmup->execute()) {
        echo "Alterado com sucesso!";
        header("Location: servicos.php");
    } else {
        echo "Erro ao alterar!";
    }
}
?>
