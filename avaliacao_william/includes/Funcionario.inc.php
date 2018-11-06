<?php

 class Funcionario{
    var $nome;
    var $altura;
    
    public function __construct($nome, $altura){
        $this->nome   = $nome;
        $this->altura = $altura;
    }

    public function Cadastrar(Funcionario $f, $link, $tabela){
        $sql = "INSERT INTO $tabela VALUES(null, '$this->nome', '$this->altura')";
        $result = $link->query($sql) or die($link->error);
        echo "<p>Funcionario cadastrado com sucesso!</p>";
    }
    public static function calcular($link, $tabela){
        $sql = "SELECT AVG(altura) FROM $tabela";
        $result = $link->query($sql) or die($link->error);
        $media = $result->fetch_array();
        $mediaFormatada = number_format($media[0], 2, '.', '');
        return $mediaFormatada;
    }

    public static function contar($link, $tabela){
        $media = self::calcular($link, $tabela);
        $sql = "SELECT nome FROM $tabela WHERE altura > '{$media}'";
        $result = $link->query($sql) or die($link->error);
        $num = $link->affected_rows;
        echo "<p>Total de pessoas com altura acima da média: $num</p>";
    }
}