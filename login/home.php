<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies com PHP</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>Login e validação de acesso com cookies em PHP</h1>
    <form action="#" method="post">
		<fieldset>
			<legend>Cadastro ou Login</legend>
			
			<button type="submit" name="cadastrar">Cadastrar</button>
            <button type="submit" name="login">Login</button>
		</fieldset>
	</form>
    <?php 
        if(isset($_POST['cadastrar'])){
            //redireciona
            header("location: cadastro.php");
        }

        if(isset($_POST['login'])){
            header("location: login.php");
        }
    ?>
</body>
</html>