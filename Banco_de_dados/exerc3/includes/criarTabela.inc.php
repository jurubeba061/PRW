<?php 
	
	//criar a tabela 
	//numero do cartão de credito criptografado por isso os 130 caracteres
	$sql = "CREATE TABLE IF NOT EXISTS $tabela(
		cpf VARCHAR(20) PRIMARY KEY,
		nome VARCHAR(200),
		cartao VARCHAR(130),
		origem VARCHAR(15),
		diarias SMALLINT UNSIGNED,
		valorDiaria DECIMAL(8,2) UNSIGNED,
		aereas VARCHAR(20),
		data DATETIME
	)";
	$resultado = $con->query($sql) or die($con->error);

 ?>