<?php 
	$pacotes = array('Windows 8 Pro -versão completa' => 650.00,
					 'Windows 7 Ultimate version' => 275.32,
					 'Linux Mageia' => 0,
					 'Microsoft Office Professional 2013' => 980.56,
					 'ESET NOD32 6.0 – licença de um ano' => 80.13 );
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Lista 2 exercicio 4</title>
	<link rel="stylesheet" href="css/materialize.css">
	<style>
		tr{ border: 1px solid #ddd; }
		th{ border: 1px solid #ddd; }
		td{ border: 1px solid #ddd; }

	</style>
</head>
<body>
	<div class="container">
		<table class="bordered highlight">
			<thead>
			    <tr>
		<?php
		arsort($pacotes);
			foreach ($pacotes as $pacote => $valor) {
				echo '
					
			        <th>'.$valor.'</th>
	 			';
			}
			echo "</tr>
				</thead>
				<tbody>
	          		<tr>
				";
			foreach ($pacotes as $pacote => $valor) {
				echo '
					
	            	<td>'.$pacote.'</td>
				';
			}
	 	?>
	 			</tr>
	        </tbody>
	 	</table>
	</div>

	
	<?php include 'includes/footer.inc.php'; ?>
</body>
</html>