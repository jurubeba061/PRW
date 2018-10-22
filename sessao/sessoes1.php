<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sessoes em PHP</title>
    <style>
        button{
            color: #fff;
            background: #f00;
            border: 1px solid #f00;
            border-radius: 15px;
            padding: 9px;
            margin-top: 10px;
            
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="aluno" placeholder="Aluno"><br><br>
        <input type="number" name="media" step="0.1" placeholder="Media"><br>
        <button type="submit" name="enviar">Criar variaveis de sessão</button>
    </form>
    <?php 
        if(isset($_POST['enviar'])){
            //tentar criar a sessão
            session_start();

            //receber os dados do form
            $nome = $_POST['aluno'];
            $media = $_POST['media'];

            //transferir os dados para o vetor $_SESSION
            $_SESSION['aluno'] = $nome;
            $_SESSION['media'] = $media;
            $_SESSION['data']  = date('d/m/y');

            //ir para o arquivo 2, que le e apaga as variaveis de sessão
            echo'<a href="sessoes2.php" target="_blank">Mostrar dados das variaveis de sessoẽs</a>';
        }
    ?>
</body>
</html>