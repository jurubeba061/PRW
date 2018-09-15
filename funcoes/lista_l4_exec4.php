<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Funções de usuario em PHP</title>
</head>
<body>
	<h1>Funções e includes em PHP - validar dados de formulario</h1>
	
	<form action="#" method="POST">
		<fieldset>
			<legend>Teste com números</legend>
			<input type="number" placeholder="Primeiro valor inteiro" name="valor1" autofocus> <br><br>

			<input type="number" placeholder="Segundo valor" name="valor2"> <br><br>

			<input type="number" placeholder="Terceiro valor" name="valor3"> <br><br>
			<button type="submit" name="enviar">Testar valores e calcular</button>
		</fieldset>
	</form>
	<?php 
		include './includes/lista_l4_exe4.inc.php';

		if (isset($_POST['enviar'])) {
			//receber os 3 valores do formulario
			$valor1 = $_POST['valor1'];
			$valor2 = $_POST['valor2'];
			$valor3 = $_POST['valor3'];
			
			//invocar cada uma das funçoes, nos includes

			//função que testa os valores inteiros
			testarValores($valor1, $valor2, $valor3);

			//somar os 3 valores
			$soma = somar($valor1, $valor2, $valor3);

			//calcular a raiz quadrada da soma
			calcularRaiz($soma);
		}
	
	 ?>

</body>
</html>