<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("img/planodefundo1.webp");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-header {
            margin-bottom: 20px;
            display: flex;
    justify-content: space-between;
        }
        .form {
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #fff;
    padding: 3rem;
}

        .title h1 {
            font-size: 24px;
        }

        .input-box {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input[type="date"],
        input[type="time"],
        input[type="text"],
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            font-size: 14px;
        }

        input[type="date"]:hover,
        input[type="time"]:hover,
        input[type="text"]:hover,
        select:hover {
            background-color: #f0f0f0;
        }

        .continue-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 14px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Barber Man Shop Cadastro</title>
</head>
<body>
    <div class="form">
        <form action="#" method="POST">
            <div class="form-header">
                <div class="title">
                    <h1>Cadastre o seu agendamento aqui</h1>
                </div>
            </div>

            <div class="input-group">
                <div class="input-box">
                    <label for="data">Data</label>
                    <input id="data" type="date" name="data" required>
                </div>

                <div class="input-box">
                    <label for="hora">Hora</label>
                    <input id="hora" type="time" name="hora" required>
                </div>

                <div class="input-box">
                    <label for="E-mail">E-mail</label>
                    <input id="E-mail" type="text" name="E-mail" placeholder="Digite seu e-mail" required>
                </div>

                <div class="input-box">
                    <label for="servico">Serviço</label>
                    <select id="servico" name="servico">
                        <option value="corte_de_cabelo">Corte de cabelo</option>
                        <option value="platinado">Platinado</option>
                        <option value="sombrancelha">Sobrancelha</option>
                        <option value="navalha_zero">Navalha zero</option>
                        <option value="corte_de_barba">Corte de barba</option>
                    </select>
                </div>

                <div class="input-box">
                    <label for="funcionario">Funcionário</label>
                    <select id="funcionario" name="funcionario">
                        <option value="escolha">Escolha</option>
                        <option value="naldo">Naldo</option>
                        <option value="banolo">Banolo</option>
                        <option value="mario">Mario</option>
                        <option value="paulo">Paulo</option>
                    </select>
                </div>
            </div>

            <div class="continue-button">
                <button type="submit" name="caralho">Continuar</button>
                <button type="submit" name="caralho">Consultar agendamento</button>
            </div>
        </form>
    </div>
</body>
</html>