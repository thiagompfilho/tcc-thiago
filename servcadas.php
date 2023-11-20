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
    <style>
        body {
            background-image: url("img/planodefundo1.webp");

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 10);
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
        }

        .title {
            margin-bottom: 20px;
        }

        .input-box {
            margin: 10px 0;
            text-align: left;
        }

        .input-box label {
            display: block;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 5px;
        }

        .continue-button {
            margin-top: 20px;
        }

        .continue-button button {
            width: 100%;
            background-color: #6c63ff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .continue-button button:hover {
            background-color: #6b63fff1;
        }
        
        .btn-voltar {
            margin-top: 10px;
        }

        .btn-voltar button {
            width: 100%;
            background-color: #6c63ff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-voltar button:hover {
            background-color: #6b63fff1;
        }
    </style>
    <title>Barber Man Shop Cadastro de servicos</title>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Cadastrar serviços</h1>
    </div>
    <form action="#" method="POST">
        <div class="input-box">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" required placeholder="Nome do serviço">
        </div>

        <div class="input-box">
            <label for="valor">Valor</label>
            <input class="money" id="valor" type="text" name="valor" required placeholder="Valor do serviço">
        </div>

        <div class="input-box">
            <label for="ativo">Ativo</label>
            <input id="ativo" type="text" name="ativo" required placeholder="Está ativo">
        </div>

        <div class="continue-button">
            <button type="submit" name="caralho">Continuar</button>
        </div>

        <div class="btn-voltar">
            <button onclick="window.location.href='servicos.php'">Voltar</button>
        </div>
    </form>
</div>
</body>
</html>
<?php
if (isset($_POST['caralho'])) {

    $nome   = $_POST["nome"];
    $valor  =$_POST["valor"];
    $ativo  = $_POST["ativo"];

    if (empty($nome) || empty($valor) || empty($ativo)) {
        echo "Preencha todos os campos para que o cadastro seja efetuado com sucesso";
        exit();
    }

    $sql = "INSERT INTO tb_servicos (nome,valor,ativo) VALUES(:u,:e,:n)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':u', $nome);
    $stmt->bindParam(':e', $valor);
    $stmt->bindParam(':n', $ativo);

    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo "serviço cadastrado com sucesso";
            header("Location:servicos.php");
        }
    } else {
        echo "Algum dos dados informados está invalido<br>";
    }
}
?>