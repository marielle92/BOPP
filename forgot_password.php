<?php
	if (isset($_POST["forgotPass"])) {
		$connection = new mysqli("localhost", "root", "", "blueoasis");

		$email = $connection->real_escape_string($_POST["email"]);
		$data = $connection->query("SELECT id FROM tbl_user WHERE email='$email'");

		if ($data->num_rows > 0) {
			$str = "0123456789QWERTYUIOPMNBVCXZ";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			$url = "reset_password.php?token=" . $str . "&email=" . $email;

			//mail($email, "Reset Password", "To reset your password, please click on the link below:", "From: blueoasis.dev@gmail.com\r\n");

			$connection->query("UPDATE tbl_user SET token='$str' WHERE email='$email'");

			echo "Your reset password code has been sent to your email.";
		}
		else {
			echo "Email not found.";
		}
	}
?>

<html>
	<head>
		<title>Forgot Password</title>
	</head>
	<body>
		<form action="forgot_password.php" method="post">
			<input type="text" name="email" placeholder="Email "><br>
			<input type="submit" name="forgotPass" value="Request Password"/>
		</form>
	</body>
</html>