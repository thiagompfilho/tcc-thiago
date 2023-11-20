<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    $conn = new mysqli("localhost", "", "", "teste_agen");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Capturar os dados do formulário
    $data_agendamento = $_POST["data_agendamento"];
    $hora_agendamento = $_POST["hora_agendamento"];
    $nome_cliente = $_POST["nome_cliente"];
    $email_cliente = $_POST["email_cliente"];
    $telefone_cliente = $_POST["telefone_cliente"];
    $descricao = $_POST["descricao"];

    // Inserir os dados na tabela de agendamentos
    $sql = "INSERT INTO agendamentos (data_agendamento, hora_agendamento, nome_cliente, email_cliente, telefone_cliente, descricao) VALUES ('$data_agendamento', '$hora_agendamento', '$nome_cliente', '$email_cliente', '$telefone_cliente', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "Agendamento realizado com sucesso.";
    } else {
        echo "Erro ao agendar: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
