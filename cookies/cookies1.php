<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies com PHP</title>
    <style>
        button{
            color: #fff;
            background: #f00;
            border: 1px solid #f00;
            border-radius: 15px;
            padding: 9px;
            margin-top: 10px;
            
        }
        a{
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #f00;
        }
        a:hover{
            color: blue;
        }
  
    </style>
</head>
<body>
    <h1>Gravando informações com COOKIES em PHP</h1>

    <form action="" method="post">
        <input type="text" name="aluno" placeholder="Aluno"><br><br>
        <input type="number" name="media" placeholder="Média final"><br><br>

        <button type="submit" name="enviar">Criar Cookies</button>
    
    </form>
    <?php 
        if(isset($_POST['enviar'])){
            //receber os dados do formulário
            $aluno = $_POST['aluno'];
            $media = $_POST['media'];

            //fazendo o php retirar os dados das variaveis simples e gravá-los na forma de cookies
            //no cache do navegador, QUANDO O NAVEGADOR RETORNAR A MAQUINA DO USUARIO
            //tempo de vida do cookie: uma semana
            setcookie("aluno", $aluno, time() + 60 * 60 * 24 * 7, "/");
            setcookie("media", $media, time() + 60 * 60 * 24 * 7, "/");
            
            //fazer o PHP gerar dinamicamente um link para o arquivo cookies2.php
            //para ler e apagar estes dois cookies
            echo'<a href="cookies2.php" target="_blank" title="Cuidado! cookies aguardam ou recolhem informações da sua maquina sem voce saber">
            Mostrar dados dos cookies
            </a>';
        }

    ?>
</body>
</html>