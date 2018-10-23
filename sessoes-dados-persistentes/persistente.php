<?php 
session_start();
    //Testar se o submit foi pressionado
    if(isset($_POST['enviar'])) {
        $usuario    = $_POST['usuario']; 
        $linguagens = $_POST['linguagens'];
        //$linguagens = implode(" , ",$linguagens);
        $protocolo  = $_POST['protocolo'];
        $impressora = $_POST['impressora'];

        //inserimos os dados de cada variavel simples no vetor $_SESSION, criando variaveis de sessao
        $_SESSION['usuario']    = $usuario;
        $_SESSION['linguagens'] = $linguagens;
        $_SESSION['protocolo']  = $protocolo;
        $_SESSION['impressora'] = $impressora;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sessões com PHP</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>Preservando dados em formularios com sessões em PHP</h1>

    <form action="#" method="post">
		<fieldset>
			<legend>Cadastro de dados</legend>
			
			<label>Usuario:</label>
			<input type="text" name="usuario" autofocus
            <?php 
                if(isset($_SESSION['usuario'])){
                    echo"value=\"$usuario\"";
                }
            ?>
            ><br><br>

			<label>Linguagens de programação usadas em seu PI: </label><br>
			<input type="checkbox" name="linguagens[]" value="java"
            <?php 
                if(isset($_SESSION['linguagens']) && in_array("java", $linguagens)){
                    echo"checked";
                }
            ?>
            >Java<br>
            <input type="checkbox" name="linguagens[]" value="php"
            <?php 
                if(isset($_SESSION['linguagens']) && in_array("php", $linguagens)){
                    echo"checked";
                }
            ?>
            >PHP<br><br>

			
			<label>Escolha um protocolo padrão de transmissão de dados:</label>
			<select name="protocolo">
				<option
                <?php 
                    if(isset($_SESSION['protocolo']) && $protocolo == "http"){
                        echo"selected";
                    }
                ?>
                 value="http">HTTP</option>
				<option 
                <?php 
                    if(isset($_SESSION['protocolo']) && $protocolo == "smtp"){
                        echo"selected";
                    }
                ?>
                value="smtp">SMTP</option>
			</select><br><br>

            <label>Marca da impressora que utilizo:</label><br>
            <input type="radio" name="impressora" value="hp"
            <?php 
                    if(isset($_SESSION['impressora']) && $impressora == "hp"){
                        echo"checked";
                    }
                ?>
            >HP<br>
            <input type="radio" name="impressora" value="lexmark"
            <?php 
                    if(isset($_SESSION['impressora']) && $impressora == "lexmark"){
                        echo"checked";
                    }
                ?>
            >LexMark<br>

			<button type="submit" name="enviar">Enviar informações</button>
		</fieldset>
		
	</form>
    <?php 
        $_SESSION = array();
        session_destroy();
    ?>

</body>
</html>
