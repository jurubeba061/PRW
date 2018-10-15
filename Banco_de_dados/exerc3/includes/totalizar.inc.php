<?php

	//consulta  para multiplicar o valor de diarias pelo numero de diarias de cada hospede e fazer a soma do gasto de cada cliente

	$sql = "SELECT SUM(diarias * valorDiaria) FROM $tabela WHERE origem = 'Brasil' ";
	$resultado = $con->query($sql) or die($con->error);

	$vetorGasto = $resultado->fetch_array();
	$gastoTotal = $vetorGasto[0];
	$gastoTotal = htmlentities($gastoTotal, ENT_QUOTES, "UTF-8");

	$gastoTotalFormatado = number_format($gastoTotal, 2, ",", ".");

	echo "<p>A soma total das despesas de todos os hospedes brasileiros foi igual a R$ $gastoTotalFormatado</p>";