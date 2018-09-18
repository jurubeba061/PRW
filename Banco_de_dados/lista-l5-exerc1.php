<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>PHP + MYSQL</title>
</head>
<body>
	<h1>Sistema academico em PHP usando POO e Banco de dados mysql exercicio 1</h1>

	<form action="#" method="post">
		<fieldset>
			<legend>Sistema academico - dados do aluno</legend>
			
			<label>Matricula: </label>
			<input type="text" name="matricula" autofocus><br>

			<label>Unidade curricular: </label>
			<input type="text" name="uc"><br>

			<label>Nota 1: </label>
			<input type="number" name="nota1" step="0.1" min="0" max="0"><br>

			<label>Nota2: </label>
			<input type="number" name="nota2" step="0.1" min="0" max="0"><br>
			
			<label>Selecione a opção desejada:</label>
			<select name="operacao">
				<option value="1">Cadastrar</option>
				<option value="2">Calcular a media</option>
				<option value="3">Alunos com média superior a 6</option>
			</select>
			<button type="submit" name="enviar">Processar dados</button>
		</fieldset>
		
	</form>

	
</body>
</html>