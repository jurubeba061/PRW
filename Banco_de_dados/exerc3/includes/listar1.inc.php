<?php

	//listar em uma tabela na pagina web, o cpf, o nome e a data de check-in de todos os hospedes que não utilizaram avião em sua chegada
	//até o hotel - converter a data para o formato dd/mm/aaaa

	$sql = "SELECT cpf, nome , DATE_FORMAT(data, '%d/%m/%Y - %H:%i:%S') FROM $tabela WHERE aereas = 'Nenhuma'";

	$resultado = $con->query($sql) or die($con->error);

	//testar se a consulta acima retornou algum registro
	$qtd = $con->affected_rows;

	if ($qtd == 0) {
		echo "<p>Impossível criar tabela. Todos os hóspedes cadastrados utilizaram avião em sua viagem!</p>";
	}
	else{
		//criamos o cabeçalho da tabela
		echo "<table>
				<caption>Lista de hóspedes que não utilizaram avião</caption>
				<tr>
					<th>CPF</th>
					<th>Nome</th>
					<th>Data do check-in</th>
				</tr>";
		//agora retiramos os dados do objeto resultado, com um laço enquanto e colocamos cada registro dentro da tabela
		while($registro = $resultado->fetch_array()){
			$cpf  = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
			$nome = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
			$data = htmlentities($registro[2], ENT_QUOTES, "UTF-8");

			echo "
				<tr>
					<td>$cpf</td>
					<td>$nome</td>
					<td>$data</td>
				</tr>";
		}
		echo "</table>";
	}