<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Funções de usuario em PHP</title>
	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
	<nav class="blue">
		<div class="container">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo center"><h3>Criando vetores com funções em PHP</h3></a>
			</div>
		</div>
	</nav>
	<?php 
		//script principal
		//invocamos a função que cria um vetor qualquer- essa função retornará o vetor para esse ponto do PHP. aqui, escrevemos o vetor na pagina web
		$vetorRetornado = criarVetor();

		echo "<pre>";
		print_r($vetorRetornado);
		echo "</pre>";


		// se tiver algum comando echo na função ela não pode ser escrita fora do <body>
		//======================= Área de declaração de funções ========================================
		function criarVetor(){
			//implementamos o corpo da função
			$vetor = array("nome"        => "MariaDB",
						   "idade"       => 30,
						   "tem carro"   => true,
						   "semestre"    => "2018/2",
						   "UC"          => "Programação para Web",
						   "Media final" => 8.9 );
			return $vetor;
		}
	 ?>

	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>