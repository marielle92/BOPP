<?php
	if (isset($_POST["forgotPass"])) {
		require 'connection.php';

		$email = $cn->real_escape_string($_POST["email"]);
		$data = $cn->query("SELECT id FROM tbl_user WHERE email='$email'");

		if ($data->num_rows > 0) {
			$str = "0123456789QWERTYUIOPMNBVCXZ";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			$url = "reset_password.php?token=" . $str . "&email=" . $email;

			mail($email, "Reset Password", "To reset your password, please click on the link below:", "From: blueoasis.dev2@gmail.com\r\n");

			$cn->query("UPDATE tbl_user SET token='$str' WHERE email='$email'");

			echo '<script> alert("Reset password code has been sent to your email");  window.location.href="index.php"; </script>';
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