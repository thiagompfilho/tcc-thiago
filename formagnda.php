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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Barber Man Shop Cadastro</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    
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
    width: 100%;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body background="img/planodefundo1.webp">
    <div class="form">
        <form action="#" method="POST">
            <div class="form-header">
                <div class="title">
                    <h1>Cadastre o seu agendamento aqui</h1>
                </div>

            </div>

            <div class="input-group">
                <div class="input-box">
                    <label for="">Data</label>
                    <input id="" type="date" name="" placeholder="" required>
                </div>

                <div class="input-box">
                    <label for="">Hora</label>
                    <input id="" type="time" name="" placeholder="" required>
                </div>

                <div class="input-box">
                    <label for="E-mail">E-mail</label>
                    <input id="E-mail" type="text" name="E-mail" placeholder="Digite sua senha" required>
                </div>

                       <div class="input-box">Serviço
                <select name="serv">
                    <label><option value="valor0">escolha</label>
                    <label><option value="valor1">corte de cabelo</label>
                    <label><option value="valor1">platinado</label>
                    <label><option value="valor3">sombrancelha</label>
                    <label><option value="valor4">navalha zero</label>
                    <label><option value="valor1">corte de barba</label>
                </select>
                </div>

                  <div class="input-box">Funcionario
                <select>
                    <option value="valor0">escolha
                    <label><option value="valor1">naldo</label>
                    <label><option value="valor3">banolo</label>
                    <label><option value="valor4">mario</label>
                    <label><option value="valor1">paulo</label>


                 </select>
                </div>

            </div>
            <div class="continue-button">
                <button type="submit" name="caralho">Continuar</button>
            </div>
            <div class="continue-button"></div>
            <br>
            <div>
                <button onclick="window.location.href='pga1.php'" type="submit" name="caralho">Voltar</button></div>
            <div>  
</br>
                <button type="submit" name="caralho">Consultar agendamento</button>
            </div>
        
        </form>
    </div>
</div>
</body>
</html>