<?php 
	/*  vamos listar, em uma tabela na pagina web o tema e o numero
		de todos os projetos com data de apresentação anterior a 01/05/2015
		e que tenham professor coorientador
	*/

		$sql = "SELECT tema, participantes FROM $tabela WHERE data < '2015-05-01' AND coorientador = 'Sim' ";
		$resultado = $con->query($sql) or die($con->error);

		//testar se retornou algum dado
		if ($con->affected_rows > 0) {
			echo "<table>
					<caption>Lista de PIs com professor coorientador e com data anterior a 01/05/2015</caption>
					<tr>
						<th>Tema</th>
						<th>participantes</th>
					</tr>";
					while ($registro = $resultado->fetch_array()) {
						//proteção contra xss
						$tema          = htmlentities($registro['tema'], ENT_QUOTES, "UTF-8");
						$participantes = htmlentities($registro['participantes'], ENT_QUOTES, "UTF-8");

						echo "<tr>
								<td>$tema</td>
								<td>$participantes</td>
							 </tr>";
					
					}//fim do while
					echo "</table>"; // fim da tabela depois do loop
		}
		else{
			echo "<p>Não foi encontrado, no banco de dados nenhum registro com data anterior a 01/05/2015 e que tenha professor coorientador</p>";
		}
		//======================================================================================================================
		//implementar o codigo para excluir todos os projetos com mais de 2 alunos no grupo
		$sql = "DELETE FROM $tabela WHERE participantes > 2";
		$resultado = $con->query($sql) or die($con->error);
		$qtdApagados = $con->affected_rows;

		echo "<p>Um total de $qtdApagados registros foram apagados!</p>";
		//======================================================================================================================
		//implementar a consulta que altera, para qualquer PI no banco de dados, a data de apresentação para 01/03/2018,
		//mas somente dos registros que contenham no tema/titulo a palavra "WEB"
		$sql = "UPDATE $tabela SET data = '2018-03-01' WHERE tema LIKE '%WEB%'";
		$resultado = $con->query($sql) or die($con->error);
		$qtdAlterados = $con->affected_rows;
		echo "<p>Um total de $qtdAlterados registros foram alterados!</p>";
		//=====================================================================================================================
		//Contar o total de projetos integradores onde o campo terminalidade é igual á frase "Pesquisa teorica somente"
		//Ou onde a coluna metodologia seja igual a frase "Pesquisa de campo"
		$sql = "SELECT COUNT(*) FROM $tabela WHERE terminalidade = 'Pesquisa teórica somente' OR metodologia = 'Pesquisa de campo'";
		$resultado = $con->query($sql) or die($con->error);
		$registro = $resultado->fetch_array();

		$quantos= $registro[0];

		echo "<p>Um total de $quantos registros se encaixam na condição da pesquisa!</p>";


 ?>