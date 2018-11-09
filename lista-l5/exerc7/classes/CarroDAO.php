<?php

class CarroDAO{
    private $link;
    private $tabela;

    public function __construct($link, $tabela){
        $this->link   = $link;
        $this->tabela = $tabela;
    }

    # metodo de cadastro de veiculos
    public function cadastrar(Carro $c){
        $sql = "INSERT INTO $this->tabela VALUES('{$c->getModelo()}', '{$c->getPreco()}', '{$c->getFabricante()}', '{$c->getAno()}',
        '{$c->getCategoria()}')";
        $resultado = $this->link->query($sql) or die($this->link->error);
        $msg = "Veiculo cadastrado com sucesso!";
        return $msg;
    }

    # metodo para listar carros usados vendidos no ano de 2013
    public function listarCarrosUsados(){
        $sql = "SELECT modelo, venda, fabricante FROM $this->tabela WHERE ano = 2013 AND categoria = 'usado'";
        $resultado = $this->link->query($sql) or die($this->link->error);
        echo"
            <table>
                <thead>
                    <tr>
                        <td>Modelo</td>
                        <td>Preço</td>
                        <td>Fabricante</td>
                    </tr>
                </thead>
        ";
        while($dados = $resultado->fetch_array()){
            $modelo     = htmlentities($dados[0], ENT_QUOTES, "UTF-8");
            $preco      = htmlentities($dados[1], ENT_QUOTES, "UTF-8");
            $fabricante = htmlentities($dados[2], ENT_QUOTES, "UTF-8");

            echo"
                <tbody>
                    <tr>
                        <td>$modelo</td>
                        <td>$preco</td>
                        <td>$fabricante</td>
                    </tr>
            ";
        }
        echo"
                </tbody>
            </table>
        ";
    }
    # metodo para deletar carros com ano anterior a 2000
    public function deleteCarros(){
        $sql = "DELETE FROM $this->tabela WHERE ano < 2000";
        $resultado = $this->link->query($sql) or die($this->link->error);
        $quantidade = $this->link->affected_rows;
        $msg = "Foram excluidos $quantidade registros!";
        return $msg;
    }
    # metodo para mostrar o valor total de carros novos
    public function getCarrosNovos(){
        $sql = "SELECT fabricante, COUNT(fabricante), SUM(venda) FROM $this->tabela WHERE categoria = 'novo' GROUP BY fabricante";
        $resultado = $this->link->query($sql) or die($this->link->error);
        echo"
            <table>
                <thead>
                    <tr>
                        <td>Fabricante</td>
                        <td>Carros novos</td>
                        <td>Soma de dos preços</td>
                    </tr>
        ";
        while($dados = $resultado->fetch_array()){
            $fabricante     = htmlentities($dados[0], ENT_QUOTES, "UTF-8");
            $numCarros      = htmlentities($dados[1], ENT_QUOTES, "UTF-8");
            $preco          = htmlentities($dados[2], ENT_QUOTES, "UTF-8");
            $precoFormatado = number_format($preco, 2, ",", ".");
            echo"
                <tbody>
                    <tr>
                        <td>$fabricante</td>
                        <td>$numCarros</td>
                        <td>$precoFormatado</td>
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