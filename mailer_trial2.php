<?php
	$msg = "";
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "PHPMailer/PHPMailer.php";
	include_once "PHPMailer/Exception.php"

	if (isset($_POST['submit'])) {
		$subject = $_POST['subject'];
		$email = $_POST['email'];
		$message = $_POST['message'];
	}

	$mail = new PHPMailer();
	$mail->addAddress('blueoasis.dev2@gmail.com');
	$mail->setFrom($email);
	$mail->Subject = $subject;
	$mail->isHTML(isHTML: true);
	$mail->Body=$message;

	if ($mail->send())
		$msg = "email sent";
	else
		$msg = "sending failed";
?>

<html>
<head>
	<title>Contact Form trial</title>
</head>
<body>
	<?php if ($msg !="") echo $msg . "<br><br>"; ?>
	<form method="post" action="mailer_trial2.php">
		<label>Subject</label><input type="text" name="subject"><br>
		<label>Email</label><input type="email" name="email"><br>
		<label>Message</label><textarea name="message"></textarea><br>
		<label>Attachment</label><input type="file" name="attachment" enctype="multiparty/form-data"><br>
		<input type="submit" value="Send">
	</form>
</body>
</html>