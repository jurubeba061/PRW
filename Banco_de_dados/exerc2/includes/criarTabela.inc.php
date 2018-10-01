0<?php 
	
	//criar a tabela projeto_integrador
	$sql = "CREATE TABLE IF NOT EXISTS $tabela(
		id INTEGER PRIMARY KEY AUTO_INCREMENT,
		tema VARCHAR(200),
		participantes TINYINT(3),
		data DATE,
		terminalidade VARCHAR(50),
		coorientador VARCHAR(5),
		metodologia VARCHAR(100)

	)";
	$resultado = $con->query($sql) or die($con->error);

 ?>