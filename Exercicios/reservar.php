<?php 
	//inicia a sessão foi a única maneira que eu encontrei de salvar os valores da matriz
	//mesmo assim não deu muito certo
	session_start();
	//cria a sessão poltronas
	$_SESSION['poltronas'];
	$assentos = array(array(false, false, false, false),
        	array(false, false, false, false),
        	array(false, false, false, false),
        	array(false, false, false, false),
        	array(false, false, false, false)
      	);

	$valor1 = $_POST['valor1'];
	$valor2 = $_POST['valor2'];
	//converte os valores para inteiros
	$valor1 = intval($valor1);
	$valor2 = intval($valor2);

	//verifica se as coordenadas da poltrona está como true
	if($_SESSION['poltronas'][$valor1][$valor2] == true){
		//só pra mostrar o numero certo
		$valor1 += 1;
		$valor2 += 1;
		echo "A poltrona $valor2 na fila $valor1 está ocupada!";
	}
		
	else{
		$assentos[$valor1][$valor2] = true;
		//atribui a matriz $assentos para a sessão
		$_SESSION['poltronas'] = $assentos;
		//só pra mostrar o numero certo
		$valor1 += 1;
		$valor2 += 1;
		echo "A poltrona $valor2 na fila $valor1 foi reservada para você!";
	}
	
		

 ?>