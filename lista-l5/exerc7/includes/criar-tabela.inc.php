<?php
	
	$sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela( modelo VARCHAR(100), venda DECIMAL(10,2) UNSIGNED,
													fabricante VARCHAR(100), ano SMALLINT(5), categoria VARCHAR(100)
												)";																						
		$resultado = $link->query($sql) or die ($link->error);
?>

