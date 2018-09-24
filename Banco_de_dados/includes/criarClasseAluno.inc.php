<?php 
	
	class Aluno{
		var $matricula;
		var $uc;
		var $nota1;
		var $nota2;
		
		//metodo para receber os dados do formulario
		//sempre usar os metodos de prevenção contra injeção de sql
		function receberDados($con){
			$matricula = trim($con->escape_string($_POST['matricula']));
			$uc        = trim($con->escape_string($_POST['uc']));
			$nota1     = trim($con->escape_string($_POST['nota1']));
			$nota2     = trim($con->escape_string($_POST['nota2']));

			$this->matricula = $matricula;
			$this->uc        = $uc;
			$this->nota1     = $nota1;
			$this->nota2     = $nota2;

		}
		//============================================================================
		function cadastrarDados($con, $nomeTabela){
			$sql = "INSERT INTO $nomeTabela VALUES('$this->matricula', '$this->uc', $this->nota1, $this->nota2)";
			$resultado = $con->query($sql) or die($con->error);
			echo "<p>Cadastrado com sucesso!</p>";
		}

	}

 ?>