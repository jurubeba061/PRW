<?php 
	
	function testarFormulario(){
		//Testar se um botão de radio foi marcado
		if (isset($_POST['estado-civil'])) {
			$estado = $_POST['estado-civil'];
			echo "<p>Estado Civil do usuario: $estado</p>";
		}
		else{
			echo "<p>Aviso! Estado Civil não selecionado!</p>";
			exit();
		}
		//teste do checkbox - lembrar que os dados de um checkbox sempre são armazenados como um vetor
		if (isset($_POST['marcas'])) {
			$vetor = $_POST['marcas'];
			$itens = count($vetor);
			echo "<p>Número de checkbox marcados: $itens</p>";
		}
		else
			echo "<p>Número de checkbox marcados: 0</p>";
		
	}

 ?>