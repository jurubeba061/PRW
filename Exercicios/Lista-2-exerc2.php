<?php 
	$disciplinas = array('Programação web' => 9.2 ,
						 'POO' => 7.5,
						 'Analise de sistemas' => 8.1,
						 'Redes de Computadores' => 9.5 );
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Lista 2 exercicio 2</title>
	<link rel="stylesheet" href="css/materialize.css">
</head>
<body>
	
	<div class="container">
		<table class="bordered highlight">
			<thead>
			    <tr>
			        <th>Unidade curricular</th>
			        <th>Média semestral</th>
			    </tr>
			</thead>
	<?php	
		
		foreach ($disciplinas as $disciplina => $valor) {
			echo '
	        	<tbody>
	          		<tr>
	            		<td>'.$disciplina.'</td>
	            		<td>'.$valor.'</td>
	          		</tr>
	        	</tbody>
	      	
			';
		}
		echo "
			</table>
		</div>
		";
	 ?>
	<?php include 'includes/footer.inc.php'; ?>
</body>
</html>