<?php 

	class Curso{
		var $nome;
		var $duracao;
		
		function __construct($nome, $duracao){
			$this->nome    = $nome;
			$this->duracao = $duracao;
		}
	
		//metodo para classificação de cada curso
		function classificar(){
			
			if ($this->duracao <= 1) {
				$classificacao = "Curso de curta duração";
			}
			elseif ($this->duracao <= 4) {
				$classificacao = "Curso de media duração";
			}
			else
				$classificacao = "Curso de longa duração";

			return $classificacao;
		}

	}
 ?>