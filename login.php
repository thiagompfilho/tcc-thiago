<?php
session_start();
include_once "mysql.php";

$pdo = conectar();

if (isset($_POST['login_submit'])) {
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    if (empty($email) || empty($senha)) {
        echo "Email e senha são obrigatórios";
        exit();
    }

    $sql = "SELECT * FROM tb_clientes WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Armazena o código do cliente na sessão
            $_SESSION['codcli'] = $usuario['codcli'];

            // Redireciona para a página pga1.php
            header("Location: pga1.php");
            exit();
        } else {
            echo "Usuário ou senha inválido";
        }
    } else {
        echo "Erro ao executar a consulta";
    }
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Barber Man Shop Login</title>
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
                    <h1>Login</h1>
                </div>

            </div>

            <div class="input-group">
                <div class="input-box">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Digite o email usado" required>
                </div>

                <div class="input-box">
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                </div>
                </div>
            <div class="continue-button">
                

            <div class="continue-button">
                <button type="submit" name="login_submit"><a>Continuar</a></button>
                </div>
<div class="continue-button">
                <button><a href="redefinir_senha.php">Esqueçeu sua senha</a></button>
            </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>
<?php

if (isset($_POST['login_submit'])) {

    $email   = $_POST['email'];
    $senha  = md5($_POST['senha']);

    if (empty($email)){
        echo "Nome não informado";
        exit();
    }
    if (empty($senha)){
        echo "Senha não informada";
        exit();
    }


    $sql = "SELECT * from tb_clientes WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    if ($stmt->execute()) {

        if ($stmt->rowCount() > 0) {
            echo "Usuario logado com sucesso";
            header("Location: pga1.php");
        }
    } else {
        echo "";
    }
}

?>