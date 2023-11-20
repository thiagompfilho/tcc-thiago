<?php 
/*
if (!isset($_SESSION)){ session_start();}

if (!isset($_SESSION['id'])) {
    session_destroy();
    header("Location: ../login1.php"); 
    exit;
}
*/
include 'mysql.php';
include 'funcaoData.php'; 

$pdo = conectar();

$stmc = $pdo->query("SELECT * FROM tb_clientes");
$rcli = $stmc->FETCHALL(PDO::FETCH_ASSOC);

$stmp = $pdo->query("SELECT * FROM tb_servicos");
$rpro = $stmp->FETCHALL(PDO::FETCH_ASSOC);

$stma = $pdo->query("SELECT * from tb_agendas where date(dataag) >= date(now()) and cliente = 0 and statusa = 'A' GROUP BY dataag");
$rdia = $stma->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Agendar horário</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.js" type="text/javascript"></script>
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
            background-image: url('img/planodefundo1.webp');
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            padding: 20px;
        }

        .form-header {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
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
		.btn-back {
    padding: 10px 20px;
    background-color: #6c757d; /* Cor de fundo */
    color: #fff; /* Cor do texto */
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 14px;
}

.btn-back:hover {
    background-color: #5a6268; /* Cor de fundo ao passar o mouse */
}

.btn-primary {
    padding: 10px 20px;
    background-color: #007BFF; /* Cor de fundo */
    color: #fff; /* Cor do texto */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 14px;
}

.btn-primary:hover {
    background-color: #0056b3; /* Cor de fundo ao passar o mouse */
}
    </style>
</head>
<body>
	<div class="container">
		<form method="POST">
			<div class="form">
				<label>Cliente</label>
				<select name="cliente" id='cliente'>
					<option>Selecione</option>
					<?php foreach ($rcli as $c) { ?>
						<option value="<?php echo $c['codcli'];?>"><?php echo $c['nome'];?></option>
					<?php }?>
				</select>
			</div>
			<br>
				<div class="form">
				<label>Procedimento</label>
				<select name="procedimento" id='proced'>
					<option>Selecione</option>
					<?php foreach ($rpro as $r) { ?>
						<option value="<?php echo $r['codservico'];?>"><?php echo $r['nome'];?></option>
					<?php }?>
				</select>
			</div>
			<br>
			<div class="form">
				<label>Data</label>
				<select name="datas" id="datas" required>
					<option>Selecione</option>}
					<?php foreach($rdia as $a){ ?>
					<option value="<?php echo $a['dataag'];?>"><?php echo brmy($a['dataag']);?></option>
					<?php } ?>
				</select>
			</div>
			<br>
			<div class="form">
				<label>Horario</label>
				<select name="horario" id="horario" disabled required>
					<option>Selecione</option>
				</select>
			</div>
			<br>
			<div>
			<button type="submit" name="btnAgendar" class="btn btn-primary">Agendar</button>
					</div>
					<br>
					<div>
			<a class="btn btn-back" href="caminho_agenda.php">Voltar</a>
			</div>
		</form>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#datas').on('change', function() {
    	console.log($('#datas').val());
	    $.ajax({
            type: 'POST',
            url: 'buscadia.php',
            data: {'dia': $('#datas').val(),
        			'procedimento': $('#proced').val()},

            beforeSend: function(xhr) {
                $('#horario').attr('disabled', 'disabled');
                if ($('#datas').val() !== 'ano') {
                   $('#horario').html('<option value="">Carregando...</option>');
                }else{
                   $('#horario').html('<option value="">Selecione</option>');
                }
            },
            success: function(data) {
                if ($('#datas').val() !== '') {
                    $('#horario').html('<option value="">Selecione</option>');
                    $('#horario').append(data);
                    $('#horario').removeAttr('disabled').focus();
                }
            }

        });
  });
});
</script>
</body>
</html>
<?php 
if (isset($_POST['btnAgendar'])){
	$horario = isset($_POST['horario']) ? $_POST['horario'] : null;
	$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : null;
	$agendado = "M";

	echo $horario;

	$stagenda = $pdo->prepare("UPDATE tb_agendas SET cliente = :c, statusa = :s WHERE codaage = :ho");

	$stagenda->bindValue(":c", $cliente);
	$stagenda->bindValue(":s", $agendado);
	$stagenda->bindValue(":ho", $horario);

	if($stagenda->execute()){

		 
	}
}
?>