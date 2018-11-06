<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Exercicio Avaliativo</title>
</head>
<body>
    <h1>PHP + MySQL - Exercicio avaliativo</h1>
    <form action="" method="post">
    <!-- Primeira parte do formulário -->
        <fieldset>
            <legend>Cadastro de informações</legend>
            <label class="alinha">Nome:</label>
            <input type="text" name="nome"><br>

            <label class="alinha">Altura(em centímetros):</label>
            <input type="number" name="altura" min="0" step="0.01">
        </fieldset>
        <!-- Segunda parte do formulário -->
        <fieldset>
            <legend>Escolha a operação desejada</legend>
            <div>
                <input type="radio" name="opcao" value="cadastrar">Cadastrar Funcionário
            </div>

            <div>
                <input type="radio" name="opcao" value="calcular">Calcular altura média
            </div>

            <div>
                <input type="radio" name="opcao" value="contar">Contar número de pessoas com altura acima da média
            </div>
            <button type="submit" name="executar">Executar operação</button>
        </fieldset>
    </form>

    <?php
    //includes de conexão com o banco de dados
    require "includes/dadosConnect.inc.php";
    require "includes/connect.inc.php";
    require "includes/definirCharset.inc.php";
    require "includes/criarDB.inc.php";
    require "includes/selectDB.inc.php";
    require "includes/criarTabela.inc.php";
    require "includes/Funcionario.inc.php";
        if(isset($_POST['executar'])){
            //opção desejada no formulario
            $opc = $_POST['opcao'];

            switch($opc){
                case "cadastrar":
                    //pegas os dados
                    $nome = $_POST['nome'];
                    $altura = $_POST['altura'];
                    $funcionario = new Funcionario($nome, $altura);
                    //chama o metodo de cadstrar
                    $funcionario->cadastrar($funcionario, $link, $tabela);
                break;
                
                case "calcular":
                    //metodo estatico calcular
                    $media = Funcionario::calcular($link, $tabela);
                    echo "<p>A média de todas as alturas é $media</p>";
                break;
                
                case "contar":
                    //metodo estatico contar
                    Funcionario::contar($link, $tabela);
                break;
            }
        }
        $link->close();
    ?>
    
</body>
</html>