<?php 
	$produtos = array("Impressora"     => array('preco' => 350.00, 'quantidade' => 10),
					  "Mouse Laser"    => array('preco' => 45.32,  'quantidade' => 45),
					  "Placa de video" => array('preco' => 456.78, 'quantidade' => 15),
					  "Webcam"         => array('preco' => 62.00,  'quantidade' => 12)
					);
	//print_r($produtos);
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Lista 3 exercicio 2</title>
	<link rel="stylesheet" href="css/materialize.css">
</head>
<body>
	<div class="container">
		<table class="bordered highlight">
			<thead>
			    <tr>
			        <th>Produto</th>
			        <th>Preço</th>
			        <th>Quantidade em estoque</th>
			    </tr>
			</thead>
	<?php
		//calcula o total de vendas
		foreach ($produtos as $produto => $valor) {
				$soma += $valor['preco'] * $valor['quantidade'];
			}	
		$totalFormatado = number_format($soma, 2, ",", ".");
		//mostra os produtos
		foreach($produtos as $produto => $valor) {
			echo '
	        	<tbody>
	          		<tr>
	            		<td>'.$produto.'</td>
	            		<td>'.$valor['preco'].'</td>
	            		<td>'.$valor['quantidade'].'</td>
	          		</tr>
	        	</tbody>
	      	
			';
		}
		echo '
			</table><br><br>
			<p>Faturamento Total: R$ '.$totalFormatado.'</p>
		</div>
		';
		$menorValor = min(array_column($produtos, 'preco'));
		echo'
			<div class="container">
				<p>Menor Preço: '.$menorValor.'</p>
			</div>
		';

	 ?>

	
	<?php include 'includes/footer.inc.php'; ?>
</body>
</html>