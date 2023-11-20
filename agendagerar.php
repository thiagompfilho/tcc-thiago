<?php
require_once 'mysql.php';

$pdo = conectar();

$stmt = $pdo->query("select * from tb_servicos");
$rpro = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmp = $pdo->query("SELECT * FROM tb_horarios WHERE codhorario = 1");
$rpar = $stmp->fetch(PDO::FETCH_ASSOC);

$hini = strtotime($rpar['entradam']);
$hfim = strtotime($rpar['saidam']);
$hiin = strtotime($rpar['entradat']);
$hifi = strtotime($rpar['saidat']);
$indice = 0;

if (isset($_POST['btnGera'])) {
    $proced = isset($_POST['codservico']) ? $_POST['codservico'] : null;
    $mes = isset($_POST['mes']) ? $_POST['mes'] : null;
    $diai = isset($_POST['diai']) ? intval($_POST['diai']) : null;
    $diaf = isset($_POST['diaf']) ? intval($_POST['diaf']) : null;
    $horarios = array();

    if ($proced == 0) {
        foreach ($rpro as $r) {
            for ($d = $diai; $d <= $diaf; $d++) {
                $dt_agenda = date('Y') . '-' . strval($mes) . '-' . strval($d);
                $dt_ag = strval($d) . '-' . strval($mes) . '-' . date('Y');
                if (date('w', strtotime($dt_ag)) != 0) {
                    for ($hi = $hini; $hi < $hfim; $hi = strtotime('+60 minutes', $hi)) {
                        if ($hi < $hiin || $hi >= $hifi) {
                            $indice++;
                            $hr_comeca = date('H:i', $hi);
                            $horarios[$indice] = array(
                                "dataa" => $dt_agenda,
                                "hora" => $hr_comeca,
                                "codservico_fk" => $r['codservico'],
                                "cliente" => 0,
                                "statu" => "A"
                            );
                        }
                    }
                }
            }
        }
    } else {
        for ($d = $diai; $d <= $diaf; $d++) {
            $dt_agenda = date('Y') . "-" . strval($mes) . '-' . strval($d);
            $dt_ag = strval($d) . '-' . strval($mes) . '-' . date('Y');
            if (date('w', strtotime($dt_ag)) != 0) {
                for ($hi = $hini; $hi < $hfim; $hi = strtotime('+60 minutes', $hi)) {
                    if ($hi < $hiin || $hi >= $hifi) {
                        $indice++;
                        $hr_comeca = date('H:i', $hi);
                        $horarios[$indice] = array(
                            "dataa" => $dt_agenda,
                            "hora" => $hr_comeca,
                            "codservico_fk" => $proced,
                            "cliente" => 0,
                            "statu" => "A"
                        );
                    }
                }
            }
        }
    }

    if (!empty($horarios)) {
        foreach ($horarios as $v) {
            $sql = "INSERT INTO tb_agendas (codaage, codservico_fk, datan, hora, statu) VALUES (:c, :p, :d, :h, :s)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":c", $v['cliente']);
            $stmt->bindValue(":p", $v['codservico_fk']);
            $stmt->bindValue(":d", $v['dataa']);
            $stmt->bindValue(":h", $v['hora']);
            $stmt->bindValue(":s", $v['statu']);
            $stmt->execute();
        }
        echo "Geração concluída com sucesso!";
    } else {
        echo "O array está vazio, nada a gerar.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulário de Geração de Agenda</title>
</head>
<body>
    <h1>Formulário de Geração de Agenda</h1>
    <form action="gerar_agenda.php" method="post">
        <label for="codservico">Selecione o procedimento:</label>
        <select name="codservico" id="codservico">
            <option value="0">Todos</option>
            <?php
            foreach ($rpro as $r) {
                echo "<option value='{$r['codservico']}'>{$r['nome']}</option>";
            }
            ?>
        </select>
        <br>

        <label for="mes">Selecione o mês:</label>
        <select name="mes" id="mes">
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
					<option value="12">Dezembro</option>            <!-- Adicione opções para todos os meses aqui -->
        </select>
        <br>

        <label for="diai">Dia Inicial:</label>
        <select name="diai" id="diai">
            <!-- Opções de dia serão preenchidas via JavaScript -->
        </select>
        <br>

        <label for="diaf">Dia Final:</label>
        <select name="diaf" id="diaf">
            <!-- Opções de dia serão preenchidas via JavaScript -->
        </select>
        <br>

        <input type="submit" name="btnGera" value="Gerar Agenda">
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('#mes').on('change', function () {
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
            for (var i = 1; i <= numeroDias; i++) {
                $("#diai").append("<option value=" + i + ">" + i + "</option>");
            }
            for (var f = 1; f <= numeroDias; f++) {
                $('#diaf').append('<option value=' + f + '>' + f + '</option>');
            }
        });
    </script>
</body>
</html>
