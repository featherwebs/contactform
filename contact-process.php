<?php
session_start();
require 'libs/mailer/PHPMailerAutoload.php';
$errors = [];
$success = [];

if(isset($_POST['full_name'], $_POST['email'], $_POST['contact_number'], $_POST['comment'])){
	$fields = [
	'name' => $_POST['full_name'],
	'email' => $_POST['email'],
	'phone' => $_POST['contact_number'],
	'comment' => $_POST['comment']
	]; 

	foreach($fields as $field => $data){
		if(empty($data)){
			$errors [] = 'The <strong>' . $field . '</strong> field is required.';
		}
	}

	// if(empty($errors)){
	// 	$body="
	// 	Name: '. $name .'
	// 	Email: '. $email .'
	// 	Comment:'. $comment .'
	// 	";
	// 	mail('mailmeprajwol@gmail.com' , 'Contact message', $body );
	// }else {
	// 	 		$errors[] = 'Sorry could not send email. Try again later';
	// 	 	}
	

	if(empty($errors)){
			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'gator4032.hostgator.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'akash@featherwebs.com';                 // SMTP username
			$mail->Password = 'p$ychotic123';                           // SMTP password
			$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 25;                                    // TCP port to connect to

			$mail->setFrom('akash@featherwebs.com', 'Himalayan carpet Webiste');
			$mail->addAddress('featherwebs@gmail.com', 'Email From Webiste');     // Add a recipient
			// $mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo($fields['email'], $fields['name']);
			
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Inqury from website';
			$mail->Body    = '<h5 stye="text-align:center">Inquery For Carpet From Website</h5> <strong> <br> </strong> <strong>' . $fields['contact_number']  . '</strong> <p> '. $fields['comment'] . '</p> <br><br> <strong>Regards,</strong> <br>' . $fields['name'] . '<br>' . $fields['phone'] . '<br>' ;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()) {
			     $success [] = "Thank you " . $fields['name'] ."! your message has been sent. we will get back to you.";

			}else{
				echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			}

	}

	// echo '<pre>', print_r($errors), '</pre>';
}
else{
	$errors[]='something went wrong';
	echo "apple";
}

$_SESSION['errors'] = $errors;
$_SESSION['success'] = $success;
$_SESSION['fields'] = $fields;
header('location:contact.php');

?>