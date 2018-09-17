<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Funções de usuario em PHP lista 4 exercicio 9</title>
</head>
<body>
	<h1>Funções e includes e PHP - gerador de senhas</h1>
	
	<form action="#" method="POST">
		<fieldset>
			<legend>Comprimento da senha</legend>
			<label>Quantidade de carcteres da senha</label><br>
			<input type="number" name="tamanho" autofocus min="6"><br>
	
			<button type="submit" name="enviar">Gerar senha</button>
		</fieldset>
	</form>

	<?php 
		require './includes/lista_l4_exec9.inc.php';

		if (isset($_POST['enviar'])) {
			//recebendo dados
			$tamanhoSenha = $_POST['tamanho'];
			gerarSenha($tamanhoSenha);
		}
		
	
	 ?>

</body>
</html>