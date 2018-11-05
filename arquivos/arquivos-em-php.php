<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Fundamentos de arquivos em PHP</title>	
</head>

<body>
	<h1>Fundamentos de arquivos em PHP</h1>
	<?php 
		//vamos gravar algumas informações, inicialmente, em uma variavel de texto
		$titulos = "Shadow Of The Tomb Raider".PHP_EOL;
		$titulos = $titulos."Far Cry".PHP_EOL;
		$titulos = $titulos."Middle Earth: Shadow of War".PHP_EOL;
		$titulos = $titulos."Assassin's Creed Odyssey".PHP_EOL;

		//vamos dar um nome ao arquivo que irá guardar estes dados
		$arquivo = "jogos.txt";

		//vamos chamar a função do PHP que grava os dados da variavel string no arquivo
		$escreveu = file_put_contents($arquivo, $titulos, FILE_APPEND|LOCK_EX); #recebe como parametro nome do arquivo e o conteudo. As constantes servem para preservar o conteudo anterior e não abrir o arquivo para mais de um usuario
		if($escreveu){
			echo "<p>Arquivo $arquivo gravado com sucesso no servidor foram gravados $escreveu bytes.</p>";
		}
	?>
	
</body>
	
</html>