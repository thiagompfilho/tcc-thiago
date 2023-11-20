<?php
session_start();
include_once "mysql.php";

$pdo = conectar();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/style4.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="js/mask.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Barber Man Shop Cadastro</title>
</head>
<body background="img/planodefundo1.webp">
<div class="container">
    <div class="form-image">
        <img src="img/undraw_shopping_re_hdd9.svg">
    </div>
    <div class="form">
        <form action="#" method="POST">
            <div class="form-header">
                <div class="title">
                    <h1>Cadastre-se</h1>
                </div>

            </div>

            <div class="input-group">
                <div class="input-box">
                    <label for="firstname">Nome</label>
                    <input id="firstname" type="text" name="firstname" placeholder="Digite seu nome" required>
                </div>
                <div class="input-box">
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                </div>
                <div class="input-box">
                    <label for="number">Celular</label>
                    <input class="phone_with_ddd"  id="number" type="text" name="number" placeholder="(xx) xxxxx-xxxx" maxlength="11" required>
                </div>
                <div class="input-box">
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password" placeholder="Digite sua senha" maxlength="32" required>
                </div>
            </div>
            <div class="continue-button">
                <button type="submit" name="caralho">Continuar</button>
            <div class="continue-button">
                    <button><a href="loginadm.php">Entrar como administrador ou funcionario</a></button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<?php
function marcarClienteAtivo($pdo, $clienteID) {
    $sql = "UPDATE tb_clientes SET ativo = 'S' WHERE codcli = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $clienteID, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return true; 
    } else {
        return false;
    }
}
if (isset($_POST['caralho'])) {
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $password = md5($_POST["password"]);

    if (empty($firstname) || empty($email) || empty($number) || empty($password)) {
        echo "Preencha todos os campos para que o cadastro seja efetuado com sucesso";
        exit();
    }

    $sql = "INSERT INTO tb_clientes (nome, email, telefone, senha) VALUES (:u, :e, :n, :p)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':u', $firstname);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':n', $number);
    $stmt->bindParam(':p', $password);

    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo "Usuário logado com sucesso";
            
            $clienteID = $pdo->lastInsertId(); 
            if (marcarClienteAtivo($pdo, $clienteID)) {
                echo "Cliente marcado como ativo com sucesso!";
            } else {
                echo "Falha ao marcar o cliente como ativo.";
            }

            header("Location: login.php");
        }
    } else {
        echo "Algum dos dados informados está inválido<br>";
    }
}


?>