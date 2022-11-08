<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require './phpmailer/src/Exception.php';
	require './phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', './phpmailer/language/');
	$mail->IsHTML(true);

	//От кого
	$mail->setFrom('kirilloff.vsevolod2017@yandex.ru', 'Заказчик')
	//Кому
	$mail->addAddress('sevakir2020@mail.ru')
	//Тема письма
	$mail->Subject = 'Обращение клиента';
	// SMTP сервера вашей почты
	$mail->Host       = 'smtp.yandex.ru'; 
	// Логин на почте
    $mail->Username   = 'kirilloff.vsevolod2017'; 
    // Пароль на почте
    $mail->Password   = 'i/too*good/malchik.'; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    // Адрес самой почты и имя отправителя
    $mail->setFrom('kirilloff.vsevolod2017@yandex.ru', 'Всеволод'); 


	//Тело письма
	$body = '<h1>Сообщение от клиента</h1>'

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['tel']))){
		$body.='<p><strong>Телефон:</strong> '.$_POST['tel'].'</p>';
	}
	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
	}

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Сообщение отправленно!':
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);


 ?>