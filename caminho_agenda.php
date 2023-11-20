<!DOCTYPE html>
<html>
<head>
  <style>
    /* Estilos para os botões */
    .btn {
      display: inline-block;
      padding: 10px 20px;
      font-size: 18px;
      background-color: #3498db;
      color: #fff;
      text-decoration: none;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 10px;
    }

    .btn-generate {
      background-color: #27ae60;
    }

    .btn-check {
      background-color: #e74c3c;
    }

    /* Centralize o conteúdo na página */
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    h1 {
      font-size: 36px;
      color: #fff;
    }

    /* Estilos para o contêiner */
    .container {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
    }
    h1 {
      font-size: 36px;
      color: black; /* Cor azul ciano */
    }
    </style>
</head>
<body background="img/planodefundo1.webp">
  <div class="container">
    <h1>Agendamentos</h1>
    <a class="btn btn-generate" href="geraAgenda.php">Gerar Agendamento</a>
    <a class="btn btn-check" href="agendae_adm.php">Agendar horario para um cliente</a>
    <a class="btn btn-back" href="somenteadm.php">Voltar</a>
  </div>
</body>
</html>
