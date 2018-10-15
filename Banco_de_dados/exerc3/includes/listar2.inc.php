<?php

	//listar na pagina web no formato tabela, o nome e o valor da despesa no checkout

	$sql = "SELECT nome, diarias * valorDiaria FROM $tabela";

	$resultado = $con->query($sql) or die($con->error);

	//criamos o cabeçalho da tabela
	echo "<table>
			<caption>Lista de hóspedes e gastos no checkout</caption>
			<tr>
				<th>Nome</th>
				<th>Valor a ser pago</th>
			</tr>";
	//agora retiramos os dados do objeto resultado, com um laço enquanto e colocamos cada registro dentro da tabela
	while($registro = $resultado->fetch_array()){
		$nome  = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
		$valor = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
		$valorFormatado = number_format($valor, 2, ",", ".");

		echo "
			<tr>
				<td>$nome</td>
				<td>$valorFormatado</td>
			</tr>";
		}
	echo "</table>";