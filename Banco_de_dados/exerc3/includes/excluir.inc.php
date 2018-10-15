<?php

	//fazemos o PHP enviar ao MYSQL a consulta, que exclui da tabela hospedes, todos os argentinos com entrada no hotel
	//antes de 01/06/2018
	$sql = "DELETE FROM $tabela WHERE origem = 'Argentina' AND data < '2018-06-01'";

	$resultado = $con->query($sql) or die($con->error);

	$qtd = $con->affected_rows;

	echo "<p>O número de hospedes argentinos com cadastro em nosso hotel anterior a 01/06/2018, foi igual a $qtd hospedes</p>";