<?php 
	function cumprimentoParte1($user){
		# antes de descobrir a hora do servidor, devemos obrigar o PHP a trabalhar com o fuso horario padrão brasileiro
		date_default_timezone_set("America/sao_paulo");

		$hora = date("H");
		if ($hora >= 6 && $hora < 12) {
			$saudacao = "bom dia $user ";
		}
		else if ($hora >= 12 && $hora < 18) {
			$saudacao = "boa tarde $user ";	
		}
		else{
			$saudacao = "boa noite $user ";
		}
		return $saudacao;
	}
	//=============================================================================
	function cumprimentoParte2($saudacaoParte1){
		//para mostrar a data em portugues
		setlocale(LC_ALL, "pt_BR.utf-8,");
		//strftime() formata a data
		$saudacaoParte2 = strftime("%A, %d de %B de %Y");
		//$saudacaoParte2 = utf8_encode($saudacaoParte2); // força o uso dos carcteres utf-8 em windows
		$saudacaoFinal = $saudacaoParte1 . "Hoje é ".$saudacaoParte2;

		return $saudacaoFinal;
	}

 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Funções de usuario em PHP</title>
</head>
<body>
	
	<h3>Funções em PHP cumprimentando o usuario</h3>
		
	
    	<form method="POST" action="#">
      		<input type="text" placeholder="Nome" name="nome">
      		<button type="submit" name="enviar-dados">Enviar</button>
    	</form>
  	
	<?php 
		if (isset($_POST['enviar-dados'])) {
			//recebendo o nome do usuario
			$user = $_POST['nome'];

			//invocamos a primeira função, que se encarregara de mostra a primeria parte da saudação: nome_user, bom_dia(tarde ou noite)
			$saudacaoParte1 = cumprimentoParte1($user);

			//invocamos a segunda função que recebe a primeira parte e monta o restante da saudação
			$saudacaoFinal = cumprimentoParte2($saudacaoParte1);

			echo "$saudacaoFinal";
		}

	 ?>

</body>
</html>