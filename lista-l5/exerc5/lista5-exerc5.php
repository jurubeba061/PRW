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
			
			<label class="alinha"> produto: </label> 
			<input class="maior" type="text" name="produto" autofocus> <br>
			
			<label class="alinha"> Preço: </label> 
			<input type="number" name="preco" min="0"> <br>
			
			<label> Operação: </label><br>
				<input type="radio" name="operacao" value="cadastro"> Cadrastrar <br>			
				<input type="radio" name="operacao" value="media"> Calcular média e listar produtos <br> 
				
				
			<button type="submit" name="executar"> Executar operaçães </button>
		</fieldset>
	</form>
	
	<?php
			require "includes/dados-conexao.inc.php";
			require "includes/conectar.inc.php";
			require "includes/criar-banco.inc.php";
			require "includes/selecionar-banco-de-dados.inc.php";
			require "includes/defenir-charset.inc.php";
			require "includes/criar-tabela.inc.php";
			require "classes/Produtos.php";
		
			if(isset($_POST['executar'])){
				# instancia um objeto da classe Produtos
				$produto = new Produtos();

				# operação escolhida
				$operacao = $_POST['operacao'];
				if($operacao == "cadastro"){
					# pega os dados do formulario
					$nome  = trim($link->escape_string($_POST['produto']));
					$preco = trim($link->escape_string($_POST['preco']));
					# seta os atributos
					$produto->setNome($nome);
					$produto->setPreco($preco);

					# chama o método para cadastrar no banco
					$msg = $produto->cadastrar($link, $nomeDaTabela);
					echo "$msg";
				}
				else{
					$media = Produtos::calcularMedia($link, $nomeDaTabela);
					$mediaFormatada = number_format($media, 2, ",", ".");
					echo"<p>Média de preço de todos os produtos: $mediaFormatada </p><br>";
					Produtos::listarProdutos($link, $nomeDaTabela);

				}
			
			}
	?>
	
	</body>
</html>
