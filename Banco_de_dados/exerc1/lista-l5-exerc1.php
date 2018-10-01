<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>PHP + MYSQL</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>Sistema academico em PHP usando POO e Banco de dados mysql exercicio 1</h1>

	<form action="#" method="post">
		<fieldset>
			<legend>Sistema academico - dados do aluno</legend>
			
			<label class="alinha">Matricula: </label>
			<input id="mat" type="text" name="matricula" autofocus><br>

			<label class="alinha">Unidade curricular: </label>
			<input id="ucInput" type="text" name="uc"><br>

			<label class="alinha">Nota 1: </label>
			<input id="n1" type="number" name="nota1" step="0.1" min="0" max="10"><br>

			<label class="alinha">Nota2: </label>
			<input id="n2" type="number" name="nota2" step="0.1" min="0" max="10"><br><br>
			
			<label class="alinha">Selecione a opção desejada:</label>
			<select name="operacao">
				<option value="1">Cadastrar</option>
				<option value="2">Calcular a media</option>
				<option value="3">Alunos com média superior a 6</option>
			</select><br>
			<button type="submit" name="enviar">Processar dados</button>
		</fieldset>
		
	</form>
	<?php 
		require "includes/dadosConnect.inc.php";
		require "includes/connect.inc.php";
		require "includes/criarDB.inc.php"; 
		require 'includes/selectDB.inc.php';
		require 'includes/definirCharset.inc.php';
		require 'includes/criarTabela.inc.php';
		#include que implementa a classe aluno
		require 'includes/criarClasseAluno.inc.php';
		#criar objeto Aluno
		$aluno1 = new Aluno();

		if (isset($_POST['enviar'])) {
			#apos o submit, devemos fazer com que o PHP receba qual a operação desejada
			$operacao = $_POST['operacao'];
			
			#testar qual operação foi selecionada
			switch ($operacao) {
				case '1':
					#metodo que recebe os dados do form
					$aluno1->receberDados($con);
					#metodo que cadastra no Banco
					$aluno1->cadastrarDados($con, $tabela);
					break;
				case '2':
					#calcular a media
					$aluno1->calcularMedia($con, $tabela);
					break;

				case '3':
					#contar quantos alunos tem media acima de 6, esse metodo terá retorno
					$quantidade = $aluno1->contar($con, $tabela);
					echo "<hr><p>Número de alunos com media acima de 6,0: $quantidade alunos.</p>";
					break;
			}
		
		}
		require 'includes/desconect.inc.php';
		#$con->close();

	 ?>
	
</body>
</html>