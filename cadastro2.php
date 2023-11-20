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
                <div class="login-button">
                    <button><a href="login.php">Login</a></button>
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
            </div>
            <div class="login-button">   
        </div>
            <script>
    // Este script será executado após o envio do formulário
    document.getElementById("firstname").value = "";
    document.getElementById("email").value = "";
    document.getElementById("number").value = "";
    document.getElementById("password").value = "";
</script>

        </form>
    </div>
</div>

</body>
</html>
<?php
if (isset($_POST['caralho'])) {

    $firstname   = $_POST["firstname"];
    $email  =$_POST["email"];
    $number  = $_POST["number"];
    $password  = md5($_POST["password"]);

    if (empty($firstname) || empty($email) || empty($number) || empty($password)) {
        echo "Preencha todos os campos para que o cadastro seja efetuado com sucesso";
        exit();
    }

    $sql = "INSERT INTO tb_clientes (nome,email,telefone,senha) VALUES(:u,:e,:n,:p)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':u', $firstname);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':n', $number);
    $stmt->bindParam(':p', $password);

    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo "Usuario logado com sucesso";
            header("Location:pga1.php");
        }
    } else {
        echo "Algum dos dados informados está invalido<br>";
    }
}
?>