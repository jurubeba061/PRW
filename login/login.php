<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/materialize.min.css"/>
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>
    <?php 
        /*aqui, nós não mostraremos o formulário de login logo em seguida. Antes, devemos fazer nosso código testar se o formulário
        é necessário
        */
        require"includes/dadosConnect.inc.php";
        require"includes/connect.inc.php";
        require"includes/criarDB.inc.php";
        require"includes/selectDB.inc.php";
        require"includes/definirCharset.inc.php";
        require"includes/criarTabela.inc.php";
        /*logo em seguida o PHP deve testar se existe um cookie chamado conectado na maquina do usuario
        se existir fazemos a validação dos dados do usuario lendo os cookies e indo até o banco de dados,
        se não existir, mostramos o formulário de login
        */
        $duracao = time() + 60 * 60 * 24 * 30 * 6;

        # Se o cookie não existe
        if(!isset($_COOKIE['conectado'])){
            # Chamamos a include com o formulário de login
            require "includes/login.inc.php";
            # recebemos os dados do form de login
            if (isset($_POST['entrar'])) {
                # recebe os dados
                $login = trim($link->escape_string($_POST['login']));
                $senha = trim($link->escape_string($_POST['senha']));
                #criptografar o login e a senha
                $login = hash("sha512", $login);
                $senha = hash("sha512", $senha);
                # consulta no banco
                $sql = "SELECT login, senha FROM $tabela WHERE login = '$login' AND senha = '$senha'";
                $resultado = $link->query($sql) or die($link->error);
                # testar se teve algum resultado
                if ($link->affected_rows == 0) {
                    exit("<p>login errado</p>");
                }
                # testar se o checkbox foi marcado
                if (isset($_POST['conectado'])) {
                    # se foi marcado cria o cookie
                    setcookie("conectado", "sim", $duracao, "/");
                    # neste ponto, tambem enviamos para o navegador os cookies de login e senha, com validade de 6 meses
                    setcookie("login" , $login, $duracao, "/");
                    setcookie("senha" , $senha, $duracao, "/");
                }
                # se o PHP chegou até aqui está tudo certo com os dados do usuario
                session_start();
                $_SESSION['conectado'] = true;

                #redirecionamos o usuario para a pagina restrita
                header("location: restrita.php");
            }
        }
    
        else{
            # Se o cookie existe precisamos fazer com que o php leia os valores dos cookies de login e senha
            # e valide estes valores no banco

        }

    ?>

    <?php require"includes/desconect.inc.php"; ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/materialize.min.js"></script>
</body>
</html>
