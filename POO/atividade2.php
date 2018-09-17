<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>POO com PHP</title>

</head>
<body>
	<h1>Programação orientada a objetos em PHP - noções basicas - atividade 2 da Apostila</h1>

	<?php 
		//arquivo principal - inserir a include que implementa a definição da Classe
		require 'includes/atividade2.inc.php';
		
		$curso1 = new Curso("Informatica", 3);
		$curso2 = new Curso("Gti", 6);

		$nome1 = $curso1->nome;
		$nome2 = $curso2->nome;

		$classe1 = $curso1->classificar();
		$classe2 = $curso2->classificar();

		echo "<p>Resultados do processamento de POO em PHP <br><br>
			 Curso 1 : $nome1  $classe1<br><br>
			 Curso 2 : $nome2  $classe2</p>";

	 ?>
	
</body>
</html>