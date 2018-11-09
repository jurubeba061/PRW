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

    #metodo para listar carros usados vendidos no ano de 2013
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
            $modelo     = $dados[0];
            $preco      = $dados[1];
            $fabricante = $dados[2];

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
}










