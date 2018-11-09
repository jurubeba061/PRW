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
			
			<label class="alinha"> Modelo: </label> 
			<input class="maior" type="text" name="modelo" autofocus> <br>
			
			<label class="alinha"> Preço de Venda: </label> 
			<input type="number" name="preco" min="0"> <br>
			
			<label class="alinha"> fabricante: </label> 
			<input type="text" name="fabricante"> <br>
			
			<label class="alinha"> Ano de lançamento: </label> 
			<input type="number" name="ano"> <br>
			
			<label class="alinha"> Categoria: </label> 
			<input type="text" name="categoria"> <br>
			
			<button type="submit" name="cadastrar"> Cadastrar Veiculo </button>
			
			<div class="container">
				<button class="btn-flex" type="submit" name="consulta-carros">Consulta carros usados </button>
				<button class="btn-flex" type="submit" name="excluir">Deletar carros antigos</button>
				<button class="btn-flex" type="submit" name="listar-preco">Listar preço dos carros novos</button>
			</div>
	</form>
	
	<?php
			require "includes/dados-conexao.inc.php";
			require "includes/conectar.inc.php";
			require "includes/criar-banco.inc.php";
			require "includes/selecionar-banco-de-dados.inc.php";
			require "includes/definir-charset.inc.php";
			require "includes/criar-tabela.inc.php";
			require "classes/Carro.php";
			require "classes/CarroDAO.php";
			$cDAO = new CarroDAO($link, $nomeDaTabela);
			
			if(isset($_POST["cadastrar"])){
				$carro = new Carro();
				
				$modelo     = $_POST['modelo'];
				$preco      = $_POST['preco'];
				$fabricante = $_POST['fabricante'];
				$ano        = $_POST['ano'];
				$cat        = $_POST['categoria'];
				#========================================
				$carro->setModelo($modelo);
				$carro->setPreco($preco);
				$carro->setFabricante($fabricante);
				$carro->setAno($ano);
				$carro->setCategoria($cat);

				$msg =  $cDAO->cadastrar($carro);

				?>
					<script>
						window.onload = function(){
							alert("<?php echo $msg; ?>");
						};
					</script>
				<?php
			}

			if(isset($_POST['consulta-carros'])){
				$cDAO->listarCarrosUsados();
			}
				
	?>
	
	</body>
</html>
