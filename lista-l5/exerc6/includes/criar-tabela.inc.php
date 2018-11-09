<?php
	
	$sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela(matricula VARCHAR(100) PRIMARY KEY, 
													nome VARCHAR(100), salario DECIMAL(10,2) UNSIGNED, 
													tempo VARCHAR(50) 
	)";																									
		$resultado = $link->query($sql) or die ($link->error);
?>

