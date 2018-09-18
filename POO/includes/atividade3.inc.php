<?php 

	class Banco{
		var $saldo;
		
		function __construct($saldo){
			$this->saldo = $saldo;
		}
	
		function saque($valor){
			if ($this->saldo < $valor) {
				$mensagem = "Saldo insuficiente";
			}
			else{
				$this->saldo -= $valor;
				$mensagem = "Saque efetuado no valor de R$ $valor";
			}
			return $mensagem;
		}

		function deposito($valor){
			$this->saldo += $valor;
			$mensagem = "deposito efetuado no valor de R$ $valor";
			return $mensagem;
		}

		function mostrarSaldo(){

			return $this->saldo;
		}

	}

 ?>