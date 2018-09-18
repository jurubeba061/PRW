<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>POO com PHP</title>

</head>
<body>
	<h1>Programação orientada a objetos em PHP - noções basicas - atividade 3 da Apostila</h1>

	<?php 
		//arquivo principal - inserir a include que implementa a definição da Classe
		require 'includes/atividade3.inc.php';
		
		$cliente1 = new Banco(500);
		$cliente2 = new Banco(300);
		$cliente3 = new Banco(1000000);

		echo "<p>Resultado do processamento do PHP</p><br>";

		//depositar
		$mensagem = $cliente2->deposito(500);
		echo "<p>$mensagem</p>";
		//mostrar saldo atualizado
		$saldo2 = $cliente2->mostrarSaldo();
		echo "<p>Saldo atualizado R$ $saldo2</p>";

		$mensagem = $cliente2->saque(200);
		echo "<p>$mensagem</p>";

		$saldo2 = $cliente2->mostrarSaldo();
		echo "<p>Saldo atualizado R$ $saldo2</p>";

	 ?>
	
</body>
</html>