<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>POO com PHP</title>

</head>
<body>
	<h1>Programação orientada a objetos em PHP - noções basicas - atividade 1 da Apostila</h1>

	<?php 
		//arquivo principal - inserir a include que implementa a definição da Classe
		require 'includes/atividade1.inc.php';
		
		$item1 = new Item("revolver", 500, "armas");
		$item2 = new Item("calça", 300, "roupas");

		$cat1 = $item1->mostrarCategoria();
		$cat2 = $item2->mostrarCategoria();

		echo "<p>Resultados do processamento de POO em PHP <br>
			 Categoria do item 1 : $cat1<br>
			 Categoria do item 2 : $cat2</p>";

	 ?>
	
</body>
</html>