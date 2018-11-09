<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Lista 5 </title> 
		<link rel="stylesheet" href="css/main.css">
</head> 

<body>
	<h1> PHP com banco de dados MySQL </h1>
	
	<form action="" method="post">
		<fieldset>
			<legend> Cadastro e processamento de informaçõens </legend>
			
			<label class="alinha">Matricula do Funcionario: </label> 
			<input type="text" name="matricula" autofocus> <br>
			
			<label class="alinha">Nome: </label> 
			<input type="text" name="nome"> <br>
			
			<label class="alinha">Salario: </label> 
			<input type="number" name="salario" min="0"> <br>
			
			<label class="alinha">Tempo de Serviço (em anos): </label> 
			<input type="number" name="tempo"> <br>
			
			<button type="submit" name="cadastrar">Cadastrar Funcionario </button>
			
			<fieldset>
			<legend> Alterar Salario do Funcionario </legend>
			<label class="alinha">Matricula do funcionario: </label>
			<input type="text" name="busca-matricula"> <br>
			
			<label class="alinha">Novo Salario: </label>
			<input type="number" name="altera-salario" min="0"> <br> <br>
			
			<button type="submit" name="alterar">Alterar Salario </button>
		</fieldset>
			<button type="submit" name="mostrar-dados">Mostrar dados</button>
		</fieldset>
		
	</form>
	
	<?php
			require "includes/dados-conexao.inc.php";
			require "includes/conectar.inc.php";
			require "includes/criar-banco.inc.php";
			require "includes/selecionar-banco-de-dados.inc.php";
			require "includes/defenir-charset.inc.php";
			require "includes/criar-tabela.inc.php";
			require "classes/Funcionario.php";
			require "classes/FuncionarioDAO.php";
			#instancia dos objetos
			$funcionario = new Funcionario();
			$fDAO = new FuncionarioDAO($link, $nomeDaTabela);

				if(isset($_POST["cadastrar"])){
				# pega os dados do form
				$matricula = trim($link->escape_string($_POST['matricula']));
				$nome      = trim($link->escape_string($_POST['nome']));
				$salario   = trim($link->escape_string($_POST['salario']));
				$tempo     = trim($link->escape_string($_POST['tempo']));

				$funcionario->setMatricula($matricula);
				$funcionario->setNome($nome);
				$funcionario->setSalario($salario);
				$funcionario->setTempo($tempo);
				# cadastra no banco
				$msg = $fDAO->cadastrarFuncionario($funcionario);
				?>
				 <script>
				 	window.onload = function(){
						 alert("<?php echo $msg; ?>");
					 };
				 </script>
				 <?php
				}
				if(isset($_POST['alterar'])){
					# pega os dados
					$matricula   = trim($link->escape_string($_POST['busca-matricula']));
					$novoSalario = trim($link->escape_string($_POST['altera-salario']));
					# passa os atributos pro objeto
					$funcionario->setMatricula($matricula);
					$funcionario->setSalario($novoSalario);
					# chama o método que faz a alteração
					$msg =  $fDAO->alterarSalario($funcionario);
					?>
				 	<script>
				 		window.onload = function(){
							 alert("<?php echo $msg; ?>");
					 	};
				 	</script>
				 	<?php
				}
				if(isset($_POST['mostrar-dados'])){
					$dados = $fDAO::contarNomes($link, $nomeDaTabela);
					echo $dados;
					$fDAO::getAllData($link, $nomeDaTabela);
				}
			
			$fDAO->desconnect();
	?>
	
	</body>
</html>
