<?php
include 'mysql.php';
include 'funcao_data.php'; 

$pdo = conecta();

$sql = "select * from agenda where date(data) >= date(now()) and cliente = 0 and status = 'A' GROUP BY data";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$agendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>..: Agendamento :..</title>
</head>
<body>
	<select name="datas" id="datas" required>
		<?php foreach($agendas as $a){ ?>
			<option value="<?php echo $a['data'];?>"><?php echo DateMyBr($a['data']);?></option>
		<?php } ?>
	</select>
	<select name="horario" id="horario" disabled required>
		<option>Selecione</option>
	</select>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#datas').on('change', function() {
        $.ajax({
            type: 'POST',
            url: 'buscadia.php',
            data: {'dia': $('#datas').val()},
            // Antes de carregar os registros, mostra para o usuário que está
            // sendo carregado.
            beforeSend: function(xhr) {
                $('#horario').attr('disabled', 'disabled');
                if ($('#datas').val() !== 'ano') {
                   $('#horario').html('<option value="">Carregando...</option>');
                }else{
                   $('#horario').html('<option value="">Selecione</option>');
                }
            },
            // Após carregar, coloca a lista dentro do select de arquivos.
            // Após carregar, coloca a lista dentro do select de arquivos.
            success: function(data) {
                if ($('#datas').val() !== '') {
                    // Adiciona o retorno no campo, habilita e da foco
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