<?php 

	function calcularMedia($dados){
		foreach ($dados as $key => $valor) {
			$valor1 = $valor['temperatura'];
			$valor2 = $valor['temperatura2'];

			$media = ($valor1 + $valor2)/2;

			echo '<p>Média de temperatura da localidade '.$key.' é: '.$media.' </p>';
		}

	}


 ?>