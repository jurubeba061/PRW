<?php 
	
	//criar a tabela projetos
	$sql = "CREATE TABLE IF NOT EXISTS $tabela(
		id VARCHAR(20) PRIMARY KEY,
		orcamento DECIMAL(10,2) UNSIGNED,
		dataInicio DATE,
		horasExecucao SMALLINT UNSIGNED
	)";
	$resultado = $link->query($sql) or die($link->error);

 ?>