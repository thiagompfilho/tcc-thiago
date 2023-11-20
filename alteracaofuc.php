<?php
session_start();
include_once('mysql.php');

$pdo = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM tb_profissionais WHERE codprof = :id";

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
    </style>
</head>

<body background="img/planodefundo1.webp">
    <div class="container">
        <h2>Alteração de Funcionários</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome do funcionário</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $re->nome; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email do funcionário</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $re->email; ?>">
            </div>
            <div class="form-group">
                <label for="telefone">Número do funcionário</label>
                <input class="form-control phone_with_ddd" type="text" id="telefone" name="telefone" value="<?php echo $re->telefone; ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha do funcionário</label>
                <input type="password" class="form-control" id="senha" name="senha" value="">
            </div>
            <div class="form-group">
                <label for="ativo">Está ativo</label>
                <select class="form-control" id="ativo" name="ativo">
                    
                    <option value="S" <?php if ($re->ativo == 'S') echo 'selected'; ?>>Sim</option>
                    <option value="N" <?php if ($re->ativo == 'N') echo 'selected'; ?>>Não</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ativo">Tipo cadastro</label>
                <select class="form-control" id="ck_cadastro" name="ck_cadastro">
                    <option value="A" <?php if ($re->ativo == 'A') echo 'selected'; ?>>ADM</option>
                    <option value="F" <?php if ($re->ativo == 'F') echo 'selected'; ?>>Funcionario</option>
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
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = md5($_POST["password"]);
    $ativo = $_POST['ativo'];
    $ck_cadastro = $_POST['ck_cadastro'];


    //verifico se tem conteúdo
    if (empty($nome)) {
        echo "Necessário informar o nome do funcionário";
        exit();
    }
    if (empty($email)) {
        echo "Necessário informar o email do funcionário";
        exit();
    }
    if (empty($telefone)) {
        echo "Necessário informar o número do funcionário";
        exit();
    }
    if (empty($ativo)) {
        echo "Necessário informar se o funcionario está ativo";
        exit();
    }
    if (empty($ck_cadastro)) {
        echo "Necessário informar tipo de cadastro está ativo";
        exit();
    }


    //crio o sql de alteração
    $sqlup = "UPDATE tb_profissionais SET nome = :nome, email = :email, telefone = :telefone, senha = :senha, ativo = :ativo, ck_cadastro = :ckc
             WHERE codprof = :id";

    //preparo do sql
    $stmup = $pdo->prepare($sqlup);

    // troco os parâmetros :descricao e :id
    $stmup->bindParam(':nome', $nome);
    $stmup->bindParam(':email', $email);
    $stmup->bindParam(':telefone', $telefone);
    $stmup->bindParam(':senha', $senha);
    $stmup->bindParam(':ativo', $ativo);
    $stmup->bindParam(':ckc', $ck_cadastro);
    $stmup->bindParam(':id', $id);

    //executo o sql
    if ($stmup->execute()) {
        echo "Alterado com sucesso!";
        header("Location: testefunc.php");
    } else {
        echo "Erro ao alterar!";
    }
}
?>
