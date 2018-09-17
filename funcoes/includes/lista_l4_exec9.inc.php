<?php 
	
	function gerarSenha($tamanho){
		//na tabela ASCII, cada caracter é representado pelo computador por um número inteiro, geralmente de 0 até 255

		//inicializamos a variavel que irá armazenar a senha com null ou ""

		$senha = null;
		//criar um laço que irá se repetir o mesmo numero de vezes que o tamanho de caracteres da senha
		//A cada repetição, fazemos o PHP escolher um inteiro aleatorio entre 33 e 126. A seguir
		//convertemos este inteiro no seu caracter ASCII correspondente
		//antes do laço, criaremos vetores com codigos dos caracteres que poderão ser escolhidos pelo PHP, para compor a senha final
		$codigoPermitido1 = range(48, 57);
		$codigoPermitido2 = range(65, 90);
		$codigoPermitido3 = range(97, 122);
		$codigoPermitido4 = [47, 42, 64, 35, 33, 37];

		//juntar os 4 vetores
		$vetorCodigosASCIIpermitidos = array_merge($codigoPermitido1, $codigoPermitido2, $codigoPermitido3, $codigoPermitido4);
		/*
		echo "<pre>";
		print_r($vetorCodigosASCIIpermitidos);
		echo "</pre>";
		*/

		for ($i=0; $i < $tamanho; $i++) { 
			$inteiroAleatorio = rand(33, 122);
			//testar se o inteiro aleatorio esta presente no vetor de caracteres permitidos
			if (in_array($inteiroAleatorio, $vetorCodigosASCIIpermitidos)) {
				//converte o inteiro aleatorio em codigo ASCII e junta na senha
				$senha = $senha.chr($inteiroAleatorio);
			}
			else
				$i--;
		
		}
		$senhaCriptograda = hash("sha512", $senha);
		echo "<p>Sua senha gerada: $senha<br><br> criptografada: $senhaCriptograda</p>";
	}
	

 ?>