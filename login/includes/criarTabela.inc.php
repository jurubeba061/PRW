<?php 
	
	//criar a tabela alunos
	$sql = "CREATE TABLE IF NOT EXISTS $tabela(
		id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		nome VARCHAR(200),
		email VARCHAR(200),
		login VARCHAR(130),
		senha VARCHAR(130)
	)";
	$resultado = $link->query($sql) or die($link->error);

 ?>