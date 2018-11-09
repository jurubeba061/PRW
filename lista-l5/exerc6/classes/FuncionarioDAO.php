<?php

class FuncionarioDAO{
    private $link;
    private $tabela;

    public function __construct($link, $tabela){
        $this->link   = $link;
        $this->tabela = $tabela;
    }
    public function getLink(){
        return $this->link;
    }
    public function getTabela(){
        return $this->tabela;
    }
    #metodo para cadastro de funcionarios recebe como parametro um objeto funcionario
    public function cadastrarFuncionario(Funcionario $f ){
        $sql = "INSERT INTO $this->tabela VALUES('{$f->getMatricula()}', '{$f->getNome()}', '{$f->getSalario()}',
         '{$f->getTempo()}')";
         $resultado = $this->link->query($sql) or die($this->link->error);
         $msg = "Funcionario cadastrado!";
         return $msg;
    }

    # método para alterar o salario do funcionario através do seu número de matricula
    public function alterarSalario(Funcionario $f){
        $sql = "UPDATE $this->tabela SET salario = '{$f->getSalario()}' WHERE matricula = '{$f->getMatricula()}' ";
        $resultado = $this->link->query($sql) or die($this->link->error);
        $msg = "Salario alterado para ".$f->getSalario()." ";
        return $msg;
    }
    # metodo para contar quantos funcionarios tem joao ou maria no nome
    public static function contarNomes($link, $tabela){
        $sql = "SELECT COUNT(*) FROM $tabela WHERE nome LIKE '%maria%' OR nome LIKE '%joao%'";
        $resultado = $link->query($sql) or die($link->error);
        $quantidade = $resultado->fetch_array();
        $dados = "<p>Número de funcionarios que contem Maria ou João no nome: $quantidade[0] </p><br>";
        return $dados;
    }

    # metodo para mostrar todos os dados em uma tabela
    public static function getAllData($link, $tabela){
        $sql = "SELECT * FROM $tabela";
        $resultado = $link->query($sql) or die($link->error);
        echo"
            <table>
                <thead>
                    <tr>
                        <td>Matricula</td>
                        <td>Nome</td>
                        <td>Tempo de serviço</td>
                        <td>Salario Total</td>
                    </tr>
        ";
        while($dados = $resultado->fetch_array()){
            # primeiro pega os dados
            $matricula = $dados[0];
            $nome      = $dados[1];
            $salario   = $dados[2];
            $tempo     = $dados[3];
            #pegamos o salario e o tempo de serviço e para fazer o calculo do salario total
            if($tempo < 10){
                $salarioTotal = ($tempo * 5/100 * $salario) + $salario;
            }
            else{
                $salarioTotal = $salario + (50/100 * $salario);
            }
            echo"
                <tbody>
                    <tr>
                        <td>$matricula</td>
                        <td>$nome</td>
                        <td>$tempo</td>
                        <td>$salarioTotal</td>
                    </tr>
            ";
        }
        echo"
                </tbody>
            </table>
        ";

    }

    # método para encerrar a conexão
    public function desconnect(){
        $this->link->close();
    }

}