<?php 
	
	class Projetos{
		var $id;
		var $orcamento;
		var $dataInicio;
		var $horasExecucao;
		
		//metodo para receber os dados do formulario
		//sempre usar os metodos de prevenção contra injeção de sql
		function receberDados($link){
			$id             = trim($link->escape_string($_POST['id']));
			$orcamento      = trim($link->escape_string($_POST['orcamento']));
			$dataInicio     = trim($link->escape_string($_POST['data-inicio']));
			$horasExecucao  = trim($link->escape_string($_POST['horas']));

			$this->id             = $id;
			$this->orcamento      = $orcamento;
			$this->dataInicio     = $dataInicio;
			$this->horasExecucao  = $horasExecucao;

		}
		//============================================================================
		//metodo para cadastrar os dados no banco de dados
		function cadastrarDados($link, $nomeTabela){
			$sql = "INSERT INTO $nomeTabela VALUES('$this->id', '$this->orcamento', '$this->dataInicio', $this->horasExecucao)";
			$resultado = $link->query($sql) or die($link->error);
			echo "<p>Cadastrado com sucesso!</p>";
		}

		//implementar o metodo para listar os projetos
		function listarProjetos($link, $nomeTabela){
			$sql = "SELECT id, orcamento FROM $nomeTabela";
			$resultado = $link->query($sql) or die($link->error);

			$qtd = $link->affected_rows;
			if ($qtd == 0)
				echo "<p>Impossivel listar os projetos!</p>";
			else{
				//criamos o cabeçalho da tabela
				echo "<table>
						<caption>ID e orçamento de todos os projetos cadastrados</caption>
						<tr>
							<th>ID</th>
							<th>Orçamento</th>
						</tr>";
				//agora retiramos os dados do objeto resultado, com um laço enquanto e colocamos cada registro dentro da tabela
				while($registro = $resultado->fetch_array()){
					$id                 = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
					$orcamento          = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
					$orcamentoFormatado = number_format($orcamento, 2, ",", ".");
					
					echo "
						<tr>
							<td>$id</td>
							<td>$orcamentoFormatado</td>
						</tr>";
				}
			echo "</table>";
			}
		}

	
	}

 ?>