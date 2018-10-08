<?php 
	//receber os dados do formulario e desinfectar, evitando injeção de sql
	$cpf           = trim($con->escape_string($_POST['cpf']));
	$nome          = trim($con->escape_string($_POST['nome']));
	$cartao        = trim($con->escape_string($_POST['cartao']));
	$origem        = trim($con->escape_string($_POST['origem']));
	$valorDiarias  = trim($con->escape_string($_POST['valor']));
	$diarias       = trim($con->escape_string($_POST['diarias']));

	$companhiaAerea = "Nenhuma";
	if (isset($_POST['aviao'])) {
		$companhiaAerea = $_POST['aviao'];

		//converter para string
		$companhiaAerea = implode(" - ", $companhiaAerea);
		//proteção sql
		$companhiaAerea = trim($con->escape_string($companhiaAerea));
	}
	//criptografar o cartao
	$cartao = hash("sha512", $cartao);

	$sql = "INSERT INTO $tabela VALUES(
				'$cpf',
				'$nome',
				'$cartao',
				'$origem',
				$diarias,
				$valorDiarias,
				'$companhiaAerea',
				NOW()
	)";
	$resultado = $con->query($sql) or die($con->error);
	echo "<p>Dados cadastrados com sucesso!</p>";
 ?>