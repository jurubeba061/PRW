<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Lista 2 exercicio 5</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
    		<form class="col s12" method="POST" action="#">
      			<div class="row">
        			<div class="input-field col s6 m6 l6">
          				<input type="text" name="nome1">
          				<label>Nome</label>
        			</div>
        			<div class="input-field col s6 m6 l6">
          				<input type="number" name="idade1">
          				<label>Idade</label>
        			</div>
      			</div>
      			<div class="row">
        			<div class="input-field col s6 m6 l6">
          				<input type="text" name="nome2">
          				<label>Nome</label>
        			</div>
        			<div class="input-field col s6 m6 l6">
          				<input type="number" name="idade2">
          				<label>Idade</label>
        			</div>
      			</div>
      			<button class="btn waves-effect waves-light" type="submit" name="enviar">Enviar
    				<i class="material-icons right">send</i>
  				</button>
    		</form>
  		</div>
		
	</div>
	<?php 
		if (isset($_POST['enviar'])) {
			$nome1  = $_POST['nome1'];
			$nome2  = $_POST['nome2'];
			$idade1 = $_POST['idade1'];
			$idade2 = $_POST['idade2'];

			//validação da idade
			$idade1 = filter_var($idade1, FILTER_VALIDATE_INT);
			$idade2 = filter_var($idade2,FILTER_VALIDATE_INT);

			if ($idade1 === false || $idade2 === false) {
				echo "<p>Erro. pelo menos um dos dados não é um valor inteiro. Tente novamente</p>";
				die();
			}else{
				//criando o array
				$dados = array($nome1  => $idade1,
							   $nome2  => $idade2,
							  );

				//mostrar os dados
				echo '
					<div class="container">
						<table class="bordered highlight">
							<thead>
			    				<tr>
			        				<th>Nome</th>
			        				<th>Idade</th>
			    				</tr>
							</thead>
				';
				foreach ($dados as $nome => $idade) {
					echo '
	        			<tbody>
	          				<tr>
	            				<td>'.$nome.'</td>
	            				<td>'.$idade.'</td>
	          				</tr>
	        			</tbody>
					';
				}
				echo "
						</table>
					</div>
				";

			}
			$cont = 0;
			//percorre o vetor novamente para verificar a menor idade
			foreach ($dados as $nome => $idade) {
				if ($idade < 18) {
					$cont++;
					echo '
						<div class="container">
							<p>Menores de idade</p>
							<p>'.$nome.'  '.$idade.'</p><br>
						</div>
					';
				}
			}
			//verifica se não há menores de idade
			if ($cont == 0) {
				echo "<p>Não há menores de idade!</p>";
			}
			//pega a maior idade e o nome
			$idadeMaior = max($dados);
			$nomeMaior  = array_search($idadeMaior, $dados);
			//mostra os dados
			echo '
				<div class="container">
					<p>Pessoa mais velha</p>
					<p>'.$nomeMaior.'     Idade: '.$idadeMaior.'</p>
				</div>
			';
		
		}
		
		
	 ?>

	
	<?php include 'includes/footer.inc.php'; ?>
</body>
</html>