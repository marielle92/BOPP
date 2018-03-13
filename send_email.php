<?php
	require 'vendor/autoload.php';
	use Mailgun\Mailgun;

	// Check for empty fields
	if(empty($_POST['name'])      ||
	   empty($_POST['email'])     ||
	   empty($_POST['phone'])     ||
	   empty($_POST['message'])   ||
	   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
	   echo "No arguments Provided!";
	   return false;
	}

	$name = strip_tags(htmlspecialchars($_POST['name']));
	$email_address = strip_tags(htmlspecialchars($_POST['email']));
	$phone = strip_tags(htmlspecialchars($_POST['phone']));
	$message = strip_tags(htmlspecialchars($_POST['message']));

	// Create the email and send the message
	$to = 'blueoasis.dev2@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	$email_subject = "Website Contact Form:  $name";
	$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
	$headers = "From: blueoasis.dev2@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	$headers .= "Reply-To: $email_address";

	$mg = Mailgun::create('key-f37956629ce12886c64fafbc9db85cc9');
	$mg->messages()->send('sandboxda173ac6377b46839c0c5ff73868696b.mailgun.org', array(
		'from' => "$name <$email_address>",
		'to' => 'Admin <blueoasis.dev2@gmail.com>',
		'subject' => $email_subject,
		'text' => $email_body
	));

	// headers: {
	// 		  	"Access-Control-Allow-Headers": "Authorization, Access-Control-Allow-Headers",
	// 		  	"Content-Type": "application/x-www-form-urlencoded"
	// 		  },
	// axios({
	// 		  method:"post",
	// 		  url:"https://api.mailgun.net/v3/sandboxda173ac6377b46839c0c5ff73868696b.mailgun.org/messages",
	// 		  headers: {
	// 		  	"Access-Control-Allow-Methods": "GET,PUT,POST,DELETE,PATCH,OPTIONS"
	// 		  },
	// 		  credentials: true,
	// 		  auth: {
	// 		  	username: "api",
	// 		  	password: "key-f37956629ce12886c64fafbc9db85cc9"
	// 		  },
	// 		  data: {
	// 		  	from: "Sample <sample@email.com>",
	// 		  	to: "blueoasis.dev2@gmail.com",
	// 		  	subject: "Website Contact Form: ",
	// 		  	text: "hello world"
	// 		  }
	// 		})

	// echo '
	// 	<script src="js/jquery/jquery-3.3.1.js"></script>
	// 	<script src="js/axios/axios.min.js"></script>
	// 	<script>
	// 		axios({
	// 		  method:"post",
	// 		  url:"https://api.mailgun.net/v3/sandboxda173ac6377b46839c0c5ff73868696b.mailgun.org/messages",
	// 		  credentials: true,
	// 		  headers: {
	// 		  	"Content-Type": "application/x-www-form-urlencoded"
	// 		  },
	// 		  auth: {
	// 		  	username: "api",
	// 		  	password: "key-f37956629ce12886c64fafbc9db85cc9"
	// 		  },
	// 		  data: {
	// 		  	from: "Sample <sample@email.com>",
	// 		  	to: "blueoasis.dev2@gmail.com",
	// 		  	subject: "Website Contact Form: ",
	// 		  	text: "hello world"
	// 		  }
	// 		})
	// 		.then(function(response) {
	// 		  alert("Email sent");
	// 		  window.location.href = "contact_us.php";
	// 		});
	// 	</script>
	// ';
	return true;
?>