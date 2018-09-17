<?php 
	//declaração da classe
	class Item {
		//atributos da classe
		var $nome;
		var $preco;
		var $categoria;
		
		function __construct($nome, $preco, $categoria){
			$this->nome      = $nome;
			$this->preco     = $preco;
			$this->categoria = $categoria;
		
		}

		function mostrarCategoria(){
			
			return $this->categoria;
		}
	 
	}
 ?>