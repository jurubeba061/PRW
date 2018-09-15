<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Funções de usuario em PHP</title>
</head>
<body>
	<h1>Funções e includes e PHP - validar dados de formulário (botões de rádio e checkbox)</h1>
	
	<form action="#" method="POST">
		<fieldset>
			<legend>Validar componentes de formulário</legend>
			<label>Estado civil</label><br>
			<input type="radio" name="estado-civil" value="solteiro(a)"> Solteiro(a)<br>
			<input type="radio" name="estado-civil" value="casado(a)"> Casado(a)<br><br>
			<label>Marcas preferidas:</label><br>
			<input type="checkbox" name="marcas[]" value="samsung"> Samsung<br>
			<input type="checkbox" name="marcas[]" value="apple"> Apple<br><br>
			<button type="submit" name="enviar">Validar Formulario</button>
		</fieldset>
	</form>
	<?php 
		require './includes/lista_l4_exec5.inc.php';

		if (isset($_POST['enviar'])) {
			testarFormulario();
		}
		
	
	 ?>

</body>
</html>