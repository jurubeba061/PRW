<?php session_start(); //abrir obrigatoriamente a sessão em todas as paginas que forem usar ?>
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
    <h1>Lendo e apagando Sessoes em PHP</h1>

    <form action="" method="post">
        
        <button type="submit" name="ler">Mostrar Sessoes</button>
        <button type="submit" name="apagar">Apagar Sessoes</button>
    
    </form>
    <?php 
        //vamos programar a ação do botão que lê os dados das sessoes
        if(isset($_POST['ler'])){
            //Testar se existe as sessões
            if(isset($_SESSION['aluno']) && isset($_SESSION['media']) && isset($_SESSION['data'])){
                
                $nome  = $_SESSION['aluno'];
                $media = $_SESSION['media'];
                $data  = $_SESSION['data'];

                echo"<p>Dados das variaveis de sessão:<br> Aluno: <strong> $nome </strong> <br>
                Média: <strong> $media </strong> <br>
                Data: <strong> $data </strong><br> </p>";

            }
            else{
                echo"<p>Não tem uma ou nenhuma variavel de sessão</p>";
            }
        }
        //bota de ação para apagar as sessões
        if(isset($_POST['apagar'])){

            $_SESSION = array();
            echo"<p>Variaveis de sessoes apagadas do seu navegador!</p>";
        }
    ?>
</body>
</html>