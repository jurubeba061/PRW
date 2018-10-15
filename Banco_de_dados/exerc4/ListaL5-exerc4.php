<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Banco de dados MySQL com PHP </title> 
		<link rel="stylesheet" href="css/main.css">
</head> 

<body>
	<h1> PHP + MySQL + POO - controle de projetos </h1>
	
	<form action="" method="post">
		<fieldset>
			<legend> Controle de projetos </legend>
			
			<label class="alinha"> ID do projeto: </label> 
			
			<input type="text" name="id" autofocus> <br>
			
			<label class="alinha"> Orçamento: </label> 
			
			<input type="number" name="orcamento" min="0" step="0.01"> <br>
			
			<label class="alinha"> Data de início: </label> 
			
			<input type="date" name="data-inicio"> <br>
			
			<label class="alinha"> Número de horas de execução: </label> 
			
			<input type="number" name="horas" min="0"> <br> <br>
			
			<label class="alinha"> Selecione uma operação: </label> 
			<select name="operacao">
				<option value="1"> Cadastrar dados do projeto no banco de dados </option>
				<option  value="2"> Listar ID e orçamento de cada projeto </option>
				<option value="3"> Contar número de projetos iniciados depois de 2015 </option> 
				<option value="4"> Excluir projetos, de acordo com horas de execução e orçamento </option> 
			</select> <br> <br>
			
			<button type="submit" name="enviar"> Executar operação </button>
		</fieldset>
	</form>
	<?php 
		require 'includes/dadosConnect.inc.php';
		require 'includes/connect.inc.php';
		require 'includes/criarDB.inc.php';
		require 'includes/selectDB.inc.php';
		require 'includes/definirCharset.inc.php';
		require 'includes/criarTabela.inc.php';
		//include com a classe do Projetos
		require 'includes/criarClasseProjetos.inc.php';
		//criação do objeto Projeto
		$projeto = new Projetos();
		//testar o submit
		if (isset($_POST['enviar'])) {
			//receber a operação escolhida pelo usuario
			$operacao = $_POST['operacao'];
			switch ($operacao) {
				case '1':
					$projeto->receberDados($link);
					$projeto->cadastrarDados($link, $tabela);
					break;
				case '2':
					$projeto->listarProjetos($link, $tabela);
					break;
				case '3':
					#code
					break;
				case '4':
					#code
					break;
			}
		}

		require 'includes/desconect.inc.php';
	?>
	
</body>
</html>