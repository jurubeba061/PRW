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
    <h1>Cadastro de usuarios usando cookies e sessoes em PHP</h1>

    <form action="#" method="post">
		<fieldset>
			<legend>Cadastro de dados</legend>
			
			<label>Nome:*</label><br>
			<input type="text" name="nome" autofocus required><br>
			
            <label>Email:*</label><br>
            <input type="email" name="email" required><br>

            <label>Login:*</label><br>
            <input type="text" name="login" required><br>

            <label>Senha:*</label><br>
            <input type="password" name="senha" required><br>
	
			<button class="btn" type="submit" name="enviar">Cadastrar</button>
		</fieldset>	
    </form>
    <?php 
        require"includes/dadosConnect.inc.php";
        require"includes/connect.inc.php";
        require"includes/criarDB.inc.php";
        require"includes/selectDB.inc.php";
        require"includes/definirCharset.inc.php";
        require"includes/criarTabela.inc.php";
        if(isset($_POST['enviar'])){
            //receber os dados do formulario
            $nome   = trim($link->escape_string($_POST['nome']));
            $email  = trim($link->escape_string($_POST['email']));
            $login  = trim($link->escape_string($_POST['login']));
            $senha  = trim($link->escape_string($_POST['senha']));

            //criptografar o login e a senha
            $senha = hash("sha512", $senha);
            $login = hash("sha512", $login);
            //mandar pro banco
            $sql = "INSERT INTO $tabela VALUES(null, '$nome', '$email', '$login', '$senha')";
            $resultado = $link->query($sql) or die($link->error);
            echo"<p>Cadastrado com sucesso!</p>";
            //apos o cadastro, a proxima etapa é criarmos dois cookies de sessão
            //guardando no cache do navegador o login e senha criptografados
            setcookie("login", $login, 0, "/");
            setcookie("senha", $senha, 0, "/");
            session_start();
            $_SESSION['conectado'] = true; #comprova que o usuario passou pelo cadastro
            //redirecionamos o usuario para a primeira pagina de conteudo restrito
            header("location: restrita.php");

        }
        //desconect tem que ser o ultimo obviamente
        require"includes/desconect.inc.php";
    ?>
    
</body>
</html>