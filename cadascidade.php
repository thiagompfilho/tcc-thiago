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
    <title>Barber Man Shop Cadastro de cidades</title>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Cadastrar cidades</h1>
    </div>
    <form action="#" method="POST">
        <div class="input-box">
            <label for="nome">Nome da cidade</label>
            <input id="nome" type="text" name="nomecid" required placeholder="Nome da cidade">
        </div>

        <div class="input-box">
            <label for="ativo">Estado da cidade</label>
            <input id="ativo" type="text" name="estadocid" required placeholder="Estado da cidade">
        </div>

        <div class="continue-button">
            <button type="submit" name="caralho">Continuar</button>
        </div>

        <div class="btn-voltar">
            <button onclick="window.location.href='cidade.php'">Voltar</button>
        </div>
    </form>
</div>
</body>
</html>
<?php
if (isset($_POST['caralho'])) {

    $nomecid   = $_POST["nomecid"];
    $estadocid  =$_POST["estadocid"];

    if (empty($nomecid) || empty($estadocid)) {
        echo "Preencha todos os campos para que o cadastro seja efetuado com sucesso";
        exit();
    }

    $sql = "INSERT INTO tb_cidades (nomecid,estadocid) VALUES(:u,:n)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':u', $nomecid);
    $stmt->bindParam(':n', $estadocid);

    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo "serviço cadastrado com sucesso";
            header("Location:cidade.php");
        }
    } else {
        echo "Algum dos dados informados está invalido<br>";
    }
}
?>