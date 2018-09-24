<?php 
	
	//criar a tabela alunos
	$sql = "CREATE TABLE IF NOT EXISTS $tabela(
		matricula  VARCHAR(20) PRIMARY KEY,
		uc VARCHAR(100),
		nota1 DECIMAL(3,1),
		nota2 DECIMAL(3,1)
	)";
	$resultado = $con->query($sql) or die($con->error);

 ?>