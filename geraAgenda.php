<?php 
require_once 'mysql.php';

$pdo = conectar();

$stmt = $pdo->query("select * from tb_servicos");
$rpro = $stmt->fetchAll(PDO::FETCH_ASSOC);

$hini = strtotime('06:00');
$hfim = strtotime('18:00');
$hiin = strtotime('12:00');
$hifi = strtotime('13:00');
$indice = 0;

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Geração de Agenda</title>
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
<body background="img/planodefundo1.webp"> 
    <div class="div container">
        <form method="POST">
            <h3 class="h3">Selecione o procedimento: </h3>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="procedimento" value="0" checked><?php echo " Todos";?><br>
                <?php foreach ($rpro as $r) { ?>
                    <input type="radio" name ="procedimento" class="form-check-input" value="<?php echo $r['codservico']; ?>"><?php echo $r['nome'];?><br>
                <?php } ?>
            </div>
            <br>
            <h3 class="h3">Selecione o periodo:</h3>
            <div class="form-check">
                <label>Mes:</label> 
                <select name="mes" class="form-control col-6" id="mes">
                    <option>Selecione</option>
                    <option value="01">Janeiro</option>
                    <option value="02">Fevereiro</option>
                    <option value="03">Março</option>
                    <option value="04">Abril</option>
                    <option value="05">Maio</option>
                    <option value="06">Junho</option>
                    <option value="07">Julho</option>
                    <option value="08">Agosto</option>
                    <option value="09">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                </select>
            </div>
            <br>
            <div class="form-check">
                <label>Dia Inicial:</label>
                <select name="diai" class="form-control col-6" id="diai"></select>
            </div>
            <br>
            <div class="form-check">
                <label>Dia Final:</label>
                <select name="diaf" class="form-control col-6" id="diaf"></select>
            </div>
            <br>
            <div>
                <a class="btn btn-back" href="caminho_agenda.php">Voltar</a>
                <input type="submit" class="btn btn-primary" name="btnGera" value="Gerar">
            </div>
			<div id="mensagem" style="margin-top: 20px;"></div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
        <script>
            $('#mes').on('change', function() {
                var dinicio = document.getElementById("diai");
                var dfim = document.getElementById("diaf");
                var data = new Date();
                var mes = this.value;
                var ano = data.getFullYear();
                var numeroDias = new Date(ano, mes, 0).getDate();
                while (dinicio.length) {
                    dinicio.remove(0);
                }
                while (dfim.length) {
                    dfim.remove(0);
                }
                for (var i = 1 ; i <= numeroDias; i++) {
                    $("#diai").append("<option value="+i+">"+ i +"</option>");
                }

                for (var f=1;f <= numeroDias; f++){
                    $('#diaf').append('<option value='+f+'>'+ f +'</option>');
                }
            });
        </script>
    </div>
	

</body>
</html>
<?php
if (isset($_POST['btnGera'])){
	$proced = isset($_POST['procedimento'])? $_POST['procedimento']: null;
	$mes = isset($_POST['mes'])? $_POST['mes']: null;
	$diai = isset($_POST['diai'])? intval($_POST['diai']): null;
	$diaf = isset($_POST['diaf'])? intval($_POST['diaf']): null;


	if ($proced == 0){
		foreach($rpro as $r){
			for($d = $diai; $d <= $diaf; $d++){
				$dt_agenda = date('Y').'-'.strval($mes).'-'.strval($d);
				$dt_ag = strval($d).'-'.strval($mes).'-'.date('Y');
				if(date('w', strtotime($dt_ag) != 0 )){
					for($hi = $hini; $hi < $hfim; $hi = strtotime('+60 minutes', $hi)){
						if ($hi < $hiin || $hi >= $hifi){
							$indice++;
							$hr_comeca = date('H:i', $hi);
							$horarios[$indice] = array(
								"data" => $dt_agenda,
								"horario" => $hr_comeca,
								"procedimento" =>$r['codservico'],
								"cliente" => 0,
								"status" => "A"
							);
						}
					}
				}
			}
		}
	}else{
		for($d = $diai; $d <= $diaf; $d++){
			$dt_agenda = date('Y')."-".strval($mes).'-'.strval($d);
			$dt_ag = strval($d).'-'.strval($mes).'-'.date('Y');
			if(date('w', strtotime($dt_ag)) != 0){
				for($hi = $hini; $hi < $hfim; $hi = strtotime('+60 minutes', $hi)){
					if ($hi < $hiin || $hi >= $hifi){
						$indice++;
						$hr_comeca = date('H:i', $hi);
						$horarios[$indice] = array(
								"data" => $dt_agenda,
								"horario" => $hr_comeca,
								"procedimento" =>$proced,
								"cliente" => 0,
								"status" => "A"	);
						}
					}
				}
			}
		}
		//var_dump($horarios);
		if(!empty($horarios)){
			foreach ($horarios as $v) {

				$sql = "INSERT INTO tb_agendas ( dataag, horario, procedimento, cliente, statusa) VALUES ( :d, :h, :p, :c, :s)";
//				$sql = "insert into tb_agendas values ( :d, :h, :p, :c, :s)";
				$stmt = $pdo->prepare($sql); 
				$stmt->bindValue(":d",$v['data']);
				$stmt->bindValue(":h",$v['horario']);
				$stmt->bindValue(":p",$v['procedimento']);
				$stmt->bindValue(":c",$v['cliente']);
				$stmt->bindValue(":s",$v['status']);

				$stmt->execute();
			}
			echo '<script>$("#mensagem").html("Agenda criada com sucesso");</script>';
		}else{
			echo "O array esta vazio, nada a gerar";
		}
	}