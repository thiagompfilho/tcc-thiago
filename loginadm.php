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
                    <h1>Login ADM ou funcionario</h1>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                </div>
                <div class="input-box">
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                </div>
            </div>
           <div class="continue-button">
            <button type="submit" name="login_submit" class="continue-button">Continuar</button>
            </div>
            <div class="continue-button">
    <button><a href="cadastro.php">Se cadastrar como cliente</a></button>
</div>

            </div>
        </form>
    </div>
</div>
</body>

</html>
<?php
if (isset($_POST['login_submit'])) {

    $nome   = $_POST['nome'];
    $senha  = $_POST['senha'];

    if (empty($nome)){
        echo "Nome não informado";
        exit();
    }
    if (empty($senha)){
        echo "Senha não informada";
        exit();
    }

    $sql = "SELECT * FROM tb_profissionais WHERE nome = :nome AND senha = :senha AND ck_cadastro = :cadastro";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindValue(':cadastro', 'A'); 
    if ($stmt->execute()) {
        $user = $stmt->fetch();

        if ($stmt->rowCount() > 0) {
            $_SESSION['codprof'] = $user['codprof'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['senha'] = $user['senha'];
            $_SESSION['ck_cadastro'] = $user['ck_cadastro'];

            if ($_SESSION['ck_cadastro'] == 'A') {
                header("location: somenteadm.php");
                exit(); 
            } else {
               
                exit();
            }
        } else  {
             header("location: somentefuncionario.php");
            echo "Usuário ou Senha Inválido<br>";
        }
    } else {
        echo "Erro na consulta ao banco de dados";
    }
}
?>
