<?php

class Funcionario{
    private $matricula;
    private $nome;
    private $salario;
    private $tempo;


    # getters e setters
    #==========================================================
    public function getMatricula(){
        return $this->matricula;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getSalario(){
        return $this->salario;
    }

    public function setSalario($salario){
        $this->salario = $salario;
    }
    public function getTempo(){
        return $this->tempo;
    }

    public function setTempo($tempo){
        $this->tempo = $tempo;
    }

}