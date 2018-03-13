<?php

	require_once 'vendor/autoload.php';
	require_once 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';


	// Create the Transport
	$transport = (new Swift_SmtpTransport('ns-cloud-e1.googledomains.com', 25))
	  ->setUsername('ns-cloud-e2.googledomains.com')
	  ->setPassword('J5nd3nze7')
	;

	// Create the Mailer using your created Transport
	$mailer = new Swift_Mailer($transport);

	// Create a message
	$message = (new Swift_Message('Subject Here'))
	  ->setFrom(['blueoasis.dev2@gmail.com' => 'Blue Oasis'])
	  ->setTo(['mariellebanares@gmail.com' => 'Marielle'])
	  ->setBody('Sa wakas gumagana na mailer mo')
	  ;

	// Send the message
	$result = $mailer->send($message);
	echo "HELLO";
?>