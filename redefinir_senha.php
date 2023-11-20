<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição de Senha do usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #333;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #6c63ff; /* Cor modificada para #6c63ff */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #4f47d0; /* Cor modificada para #4f47d0 */
        }

        .back-button {
    padding: 10px;
    background-color: #6c757d; /* Cor modificada para #6c757d */
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none; /* Remover sublinhado padrão em links */
    display: inline-block; /* Remover quebra de linha após o link */
    text-align: center; /* Centralizar o texto */
}

.back-button:hover {
    background-color: #495057; /* Cor modificada para #495057 */
}


    </style>
</head>

<body background="img/planodefundo1.webp">
    <div class="container">
        <h2>Redefinição de Senha do usuario</h2>
        <form action="#" method="post">
            <label for="nova_senha">Nova Senha</label>
            <input type="password" id="nova_senha" name="nova_senha" required>

            <label for="confirmar_senha">Confirmar Senha</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required>

            <button type="submit">Redefinir Senha</button>
            <a href="login.php" class="back-button" >Voltar</a>
        </form>
    </div>
</body>

</html>
