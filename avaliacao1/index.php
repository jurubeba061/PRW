<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Avaliação William</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>Agrocooperativa AAA - controle de temperaturas com matrizes em PHP</h1>

	<form action="#" method="post">
		<fieldset>
			<legend>Levantamento de temperaturas - localidade 1</legend>
			
			<label class="alinha">Forneça o nome da localidade : </label>
			<input  type="text" name="local" autofocus><br>

			<label class="alinha">Forneça a primeira temperatura: </label>
			<input type="number" name="temp1" step="0.1" min="-10" max="40"><br>

			<label class="alinha">Forneça a segunda temperatura: </label>
			<input type="number" name="temp2" step="0.1" min="-10" max="40"><br>

		</fieldset>

		<fieldset>
			<legend>Levantamento de temperaturas - localidade 2</legend>
			
			<label class="alinha">Forneça o nome da localidade: </label>
			<input  type="text" name="local2" autofocus><br>

			<label class="alinha">Forneça a primeira temperatura: </label>
			<input type="number" name="temp1-2" step="0.1" min="-10" max="40"><br>

			<label class="alinha">Forneça a segunda temperatura: </label>
			<input type="number" name="temp2-2" step="0.1" min="-10" max="40"><br>

		</fieldset>

		<button type="submit" name="enviar">Calcular média de temperaturas</button>
		
	</form>
	<?php 
		if (isset($_POST['enviar'])) {
			//recebe os dados do formulario
			$local1 = $_POST['local'];
			$temp1  = $_POST['temp1'];
			$temp2  = $_POST['temp2'];

			$local2  = $_POST['local2'];
			$temp1_2 = $_POST['temp1-2'];
			$temp2_2 = $_POST['temp2-2'];

			//adiciona os dados na matriz
			$dados = array($local1 => array("temperatura" => $temp1 ,"temperatura2" => $temp2 ),
					 $local2 => array("temperatura" => $temp1_2, "temperatura2" => $temp2_2)

			 );

			//faz o include do arquivo contendo a função que calcula a média de temperatura
			require 'includes/calculo.inc.php';

			//função que efetua o calculo
			calcularMedia($dados);

		}
	 ?>
	
</body>
</html>