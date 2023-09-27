<?php

    //-----------------------------------------------------
	//-----------change address to xxx@yourdomainname ----------------------
	$address= "contatoregenere@ipda.com.br";
	//-----------------------------------------------------
	//-----------------------------------------------------

	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = "subject text";
	$message_content = $_POST["message"];
	if(!isset($name) || !isset($email) || !isset($message_content)){
		echo "Por favor, preencha todos os campos!";
		exit;
	}
	$headers = "From: $name <$email>\r\n";
	$headers .= "Reply-To: $subject <$email>\r\n";

	$message = "--$mime_boundary \r\n";
	
	$message .= "Você recebeu um e-mail do site da Regenere: \r\n";
	$message .= "Nome: $name \r\n";
	$message .= "Email: $email \r\n";
	$message .= "Assunto: $subject \r\n";
	$message .= "Mensagem: $message_content \r\n";
	$message .= "--$mime_boundary--\r\n";
	$mail_sent = mail($address, $subject, $message, $headers);
	if($mail_sent)
	{	
		echo $name. ": Obrigado pelo contato!";
	}
    else
    {
        echo "Ocorreu um erro ao enviar o e-mail.";
    }
?>