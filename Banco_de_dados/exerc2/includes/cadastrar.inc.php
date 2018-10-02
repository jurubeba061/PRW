<?php 
	//receber os dados do formulario e desinfecta, evitando injeção de sql
	$tema          = trim($con->escape_string($_POST['tema']));
	$nump          = trim($con->escape_string($_POST['numero-participantes']));
	$data          = trim($con->escape_string($_POST['data-apresentacao']));
	$terminalidade = trim($con->escape_string($_POST['terminalidade']));
	$coorientador  = trim($con->escape_string($_POST['coorientador']));
	$metodologia   = trim($con->escape_string($_POST['metodologia']));

	$sql = "INSERT INTO $tabela VALUES(
				NULL,
				'$tema',
				$nump,
				'$data',
				'$terminalidade',
				'$coorientador',
				'$metodologia'
	)";
	$resultado = $con->query($sql) or die($con->error);
	echo "<p>Dados cadastrados com sucesso!</p>";
 ?>