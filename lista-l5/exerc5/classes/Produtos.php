<?php
# Modelo para manipulação de produtos

class Produtos{
    private $nome;
    private $preco;

    public function getNome(){
        return $this->nome;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    # Metodo para cadastrar no banco
    public function cadastrar($link, $nomeDaTabela){
        $sql = "INSERT INTO $nomeDaTabela VALUES('{$this->getNome()}', '{$this->getPreco()}')";
        $resultado = $link->query($sql) or die($link->error);
        $msg = "<p>Produto cadastrado com sucesso!</p>";
        return $msg;
        $link->close();
    }

    # metodo para calcular a média de todos os produtos
    public static function calcularMedia($link, $nomeDaTabela){
        $sql = "SELECT AVG(preco) FROM $nomeDaTabela";
        $resultado = $link->query($sql) or die($link->error);
        $media = $resultado->fetch_array();
        return $media[0];
        $link->close();
    }
    # metodo para listar os produtos acima da média
    public static function listarProdutos($link, $nomeDaTabela){
        # chama o metodo estático para calcular a média
        $media = self::calcularMedia($link, $nomeDaTabela);
        # usa o resultado do metodo para fazer a consulta
        $sql = "SELECT produto, preco FROM $nomeDaTabela WHERE preco > '{$media}'";
        $resultado = $link->query($sql) or die($link->error);
        echo"
            <table>
                <h2>Produtos com o preço acima da média</h2>
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Preço</td>
                    </tr>
                </thead>
                <tbody>
        ";
        while($dados = $resultado->fetch_array()){
            $nome           = htmlentities($dados[0], ENT_QUOTES, "UTF-8");
            $preco          = htmlentities($dados[1], ENT_QUOTES, "UTF-8");
            $precoFormatado = number_format($preco, 2, ",", ".");
            echo"
                <tr>
                    <td>$nome</td>
                    <td>$precoFormatado</td>
                </tr>
            ";
        }
        echo"
                </tbody>
            </table>
        ";
        $link->close();
    }


}
