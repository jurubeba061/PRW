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
    </style>
 
</head>
<body>
    <h1>Lendo e apagando COOKIES em PHP</h1>

    <form action="" method="post">
        
        <button type="submit" name="ler">Mostrar Cookies</button>
        <button type="submit" name="apagar">Apagar Cookies</button>
    
    </form>
    <?php 
        //vamos programar a ação do botão que lê os dados dos cookies
        if(isset($_POST['ler'])){
            //antes de qualquer alteração de leitura, devemos testar se ambos os cookies existem
            if(isset($_COOKIE['aluno']) && isset($_COOKIE['media'])){
                //ler os dados do cookie
                $nome = $_COOKIE['aluno'];
                $media = $_COOKIE['media'];

                echo"<p>Dados recuperados dos cookies do seu navegador:<br> Aluno: <strong> $nome </strong> <br>
                Média: <strong> $media </strong> <br></p>";

            }
            else{
                echo"<p>Não tem um ou nenhum cookie</p>";
            }
        }
        //bota de ação para apagar os cookies
        if(isset($_POST['apagar'])){
            setcookie('aluno', false, 0, "/");
            setcookie('media', false, 0, "/");
            echo"<p>Cookies apagados do seu navegador!</p>";
        }
    ?>
</body>
</html>