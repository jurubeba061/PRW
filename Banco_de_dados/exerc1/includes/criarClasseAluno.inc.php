<?php 
	
	class Aluno{
		var $matricula;
		var $uc;
		var $nota1;
		var $nota2;
		
		//metodo para receber os dados do formulario
		//sempre usar os metodos de prevenção contra injeção de sql
		function receberDados($con){
			$matricula = trim($con->escape_string($_POST['matricula']));
			$uc        = trim($con->escape_string($_POST['uc']));
			$nota1     = trim($con->escape_string($_POST['nota1']));
			$nota2     = trim($con->escape_string($_POST['nota2']));

			$this->matricula = $matricula;
			$this->uc        = $uc;
			$this->nota1     = $nota1;
			$this->nota2     = $nota2;

		}
		//============================================================================
		//metodo para cadastrar os dados no banco de dados
		function cadastrarDados($con, $nomeTabela){
			$sql = "INSERT INTO $nomeTabela VALUES('$this->matricula', '$this->uc', $this->nota1, $this->nota2)";
			$resultado = $link->query($sql) or die($link->error);
			echo "<p>Cadastrado com sucesso!</p>";
		}

		//metodo que calcula a media dos alunos cadastrados no banco de dados
		function calcularMedia($con, $nomeTabela){
			//criando uma consulta qye faz o mysql devolver da tabela no banco de dados, a matricula e a media de cada aluno
			$sql = "SELECT matricula, uc, (nota1 + nota2)/2 FROM $nomeTabela";
			$resultado = $link->query($sql) or die($link->error);
			//desenhar o cabeçalho da tabela na pagina web
			echo "
				<table>
					<caption>Alunos CTI - matricula Unidade Curricular e média final</caption>
					<tr>
						<th>Matricula</th>
						<th>UC</th>
						<th>Média</th>
					</tr>
			";
			//vamos criar um laço que percorre o objeto $resultado, extrai seus dados e mostra na tabela
			while ($registro = $resultado->fetch_array()) {
				//retiramos os dados do vetor registro e inserimos na tabela, usar proteção contra xss
				$matric = htmlentities($registro[0], ENT_QUOTES, "UTF-8");//htlmentities recebe como parametro o conteudo, constante do PHP,  e conjunto de caracteres
				$uc     = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
				$media  = htmlentities($registro[2], ENT_QUOTES, "UTF-8");

				$mediaFormatada = number_format($media, 2, ",", ".");
				echo "<tr>
						<td>$matric</td>
						<td>$uc</td>
						<td>$mediaFormatada</td>
					 </tr>
				";
			}
			echo "</table>"; #precisa ser no final do while
		}

		//metodo que conta o numero de alunos com media acima de 6
		function contar($con, $nomeTabela){
			$sql = "SELECT  COUNT(*) FROM $nomeTabela WHERE (nota1 + nota2)/2 > 6";
			$resultado = $link->query($sql) or die($link->error);


			$registro = $resultado->fetch_array();
			//sanittize
			$conta = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
			
			return $conta;
		}

	}

 ?>