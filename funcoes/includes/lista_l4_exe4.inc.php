<?php 
	//definição de cada uma das funções
	function testarValores($num1, $num2, $num3){
		$valor1 = filter_var($num1, FILTER_VALIDATE_INT);
		$valor2 = filter_var($num2,FILTER_VALIDATE_INT);
		$valor3 = filter_var($num3, FILTER_VALIDATE_INT);

		if ($valor1 === false || $valor2 === false || $valor3 ===false) {
			echo "<p>Erro. pelo menos um dos dados não é um valor inteiro. Tente novamente</p>";
			die(); //encerramos a aplicação com die() ou exit()
		}
	}
	//========================================================================
	function somar($valor1, $valor2, $valor3){
		$soma = $valor1 + $valor2 + $valor3;
		echo "<p>A soma dos 3 inteiros é $soma</p>";
		return $soma;
	}
	//========================================================================
	function calcularRaiz($soma){
		if ($soma >= 0) {
			$raiz = sqrt($soma);
			$raizFormat = number_format($raiz, 2, ",", ".");
			echo "<p>A raiz quadrada de $soma vale $raizFormat</p>";
		}
		else
			echo "<p>Impossivel, no campo dos reais, extrair a raiz quadrada de $soma</p>";
	}


 ?>