<?php
	
	$sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela( modelo VARCHAR(100) PRIMARY KEY, venda DECIMAL(10,2) UNSIGNED,
													fabricante VARCHAR(100), ano VARCHAR(50), categoria VARCHAR(100)
												)";																						
		$resultado = $link->query($sql) or die ($link->error);
?>

