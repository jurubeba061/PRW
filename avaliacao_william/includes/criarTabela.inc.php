<?php 
	
	//criar a tabela funcionarios
	$sql = "CREATE TABLE IF NOT EXISTS $tabela(
		id INTEGER PRIMARY KEY AUTO_INCREMENT,
		nome VARCHAR(100),
		altura DECIMAL(2,2)
	)";
	$resultado = $link->query($sql) or die($link->error);

 ?>