<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Envio de e-mails com PHP </title> 
</head>
	<h1> Envio de e-mails em PHP usando o servidor do Google </h1>
		
	<form action="" method="post">
	
		<label> Nome do cliente: </label>
		<input type="text" name="nome" autofocus> <br> <br>
		
		<label> Login: </label>
		<input type="text" name="login"> <br> <br>
		
		<label> senha: </label>
		<input type="password" name="senha"> <br> <br>
	
		<label> Idade do cliente: </label> 
		<input type="number" name="idade" min="0" max="125"> <br> <br>
	
		<label> E-mail do usuário: </label> 
		<input type="email" name="email"> <br /> <br />

		<button type="submit" name="enviar"> Enviar cadastro </button>
	</form>
	
<?php
	# Configurações necessarias para o nosso codigo poder utilizar a classe e as includes da biblioteca PHPMailer

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require "./PHPMailer/src/Exception.php";
	require "./PHPMailer/src/PHPMailer.php";
	require "./PHPMailer/src/SMTP.php";
	
	if(isset($_POST['enviar'])){
		$emailDestinatario = $_POST['email'];
		$idade = $_POST['idade'];
		$nomeDestinatario = $_POST['nome'];
		$loginDestinatario = $_POST['login'];
		$senhaDestinatario = $_POST['senha'];

		# Criar um objeto email
		$email = new PHPMailer();

		# Definir UTF-8 como conjunto padrão de simbolos da classe
		$email->CharSet = "UTF-8";
		
		# Define a as mensagens de erro em PT-B# Nome e email R
		$email->setLanguage("pt-br");

	####################################################################
		
		# Variaveis de configuração do servidor de email(GMAIL)
		
		# Endereço do servidor de email
		$email->Host = "smtp.gmail.com";
		# Nosso email - dos desenvolvedores
		$email->Username = "remetente.ifsc2016@gmail.com";
		# Senha de acesso ao nosso email
		$email->Password = "ifsc1234";
		# Porta do servidor
		$email->Port = 587; // ou 465
		# Autenticação segura - pode usar tambem ssl
		$email->SMTPSecure = "tls";
		# Protocolo de envio de e-mail
		$email->isSMTP();
		# Estamos dizendo ao Google que nossa aplicação está fazendo autenticação segura do nosso email
		$email->SMTPAuth = true;

	################################################################

		# Configuração dos dados da mensagem
		
		# Nosso email contera HTML e CSS no corpo da mensagem
		$email->IsHTML(true);
		# Assunto da mensagem
		$email->Subject = "$nomeDestinatario, estamos testando nossa aplicação com email";

		# Dados nossos, os desenvolvedores da aplicação
		# Responder para:
		$email->addReplyTo("remetente.ifsc2016@gmail.com", "Administrador do sistema"); // segundo parametro opcional
		# Enviado por:
		$email->SetFrom("remetente.ifsc2016@gmail.com", "Administrador do sistema"); // segundo parametro opcional
		
		# Dados do destinatario
		$email->AddAddress($emailDestinatario, $nomeDestinatario); // segundo parametro opcional

		# Corpo da mensagem: é possivel enviar variaveis PHP e passar dados para outros programas em PHP, por meio de links
		/* $email->Body = "<h1>Dados cadastrados</h1>
			<p style=\"color: blue;\">Voce efetivou o cadastro em nossa aplicação. Confira seus dados a seguir. Havendo qualquer problema, Contate-nos: <br>
			Seu nome = $nomeDestinatario <br>
			Idade    = $idade <br>
			Email    = $emailDestinatario <br>
			Usuario  = $loginDestinatario <br>
			Senha    = $senhaDestinatario <br></p>
		";*/

		# Envio de pagina completa. Para isso o corpo da mensagem tem q ser desabilitado e o parametro do metodo MsgHTML() precisa ser uma string
		# convertendo o arquivo em uma string
		$arquivoString = file_get_contents("lancamentos.html");
		$email->MsgHTML($arquivoString);

		# Envio de anexos
		# $email->addAttachment("anexo1.pdf");
		# $email->addAttachment("anexo2.doc");
	#######################################################################################333

		# Agora enviamos o email
		if($email->Send()){
			echo "<p>Prezado $nomeDestinatario, seu cadastro foi efetuado com sucesso. Confira seus dados no Email</p>";
		}
		else{
			echo"<p>Email não pôde ser enviado devido ao seguinte erro: $email->ErrorInfo </p>";
		}


	}
	
?>
</body> 
</html> 
	