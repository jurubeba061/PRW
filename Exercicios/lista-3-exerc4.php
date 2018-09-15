<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Lista 3 exercicio 4</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/main.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <nav class="red darken-4">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Cinema</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Home</a></li>
          <li><a href="#">Promoções</a></li>
          <li><a href="https://www.cinemark.com.br/florianopolis/filmes/em-cartaz" target="_blank">Filmes em cartaz</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#">Home</a></li>
          <li><a href="#">Promoções</a></li>
          <li><a href="https://www.cinemark.com.br/florianopolis/filmes/em-cartaz" target="_blank">Filmes em cartaz</a></li>
        </ul>
      </div>  
    </nav>

	<h1>Reserve seu assento</h1>

  	<div class="container">
  		<div class="row">
  			<form class="col s6 m8 l8 offset-m4 offset-l4" action="" method="POST">
  				
  				<a data-valor1="0" data-valor2="0" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="0" data-valor2="1" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="0" data-valor2="2" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="0" data-valor2="3" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a><br>

  				<a data-valor1="1" data-valor2="0" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="1" data-valor2="1" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="1" data-valor2="2" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="1" data-valor2="3" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a><br>

  				<a data-valor1="2" data-valor2="0" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="2" data-valor2="1" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="2" data-valor2="2" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="2" data-valor2="3" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a><br>

  				<a data-valor1="3" data-valor2="0" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="3" data-valor2="1" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="3" data-valor2="2" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="3" data-valor2="3" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a><br>

  				<a data-valor1="4" data-valor2="0" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="4" data-valor2="1" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="4" data-valor2="2" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a>

  				<a data-valor1="4" data-valor2="3" class="poltrona" href="#"><i class="medium material-icons">event_seat</i></a><br>
			
  				<button class="btn waves-effect waves-light red darken-4" type="submit" name="enviar">Reservar
    				<i class="material-icons right">send</i>
  				</button>
  				
  			</form>
  			
  		</div>
  		
  	</div>
 

	<?php include 'includes/footer.inc.php'; ?>

    <script src="js/main.js"></script>
</body>
</html>