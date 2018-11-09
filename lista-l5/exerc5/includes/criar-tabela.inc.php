<?php
	
	$sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela( produto VARCHAR(100) PRIMARY KEY, preco DECIMAL(10,2) UNSIGNED)";
		$resultado = $link->query($sql) or die ($link->error);
?>

