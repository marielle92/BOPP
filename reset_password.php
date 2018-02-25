<html>
	<head>
		<title>Reset Password</title>
	</head>
	<body>
		<form action="reset_password_redirect.php" method="post">
			<label>Password: <input type="password" name="password1"></label><br>
			<label>Re-type password: <input type="password" name="password2"></label><br>
			<input type="submit" name="resetPassword" value="Reset Password"/><br>
	</body>
</html>

<?php
	if (isset($_GET["email"]) && isset($_GET["token"])) {
		$connection = new mysqli("localhost", "root", "", "blueoasis");

		$email = $connection->real_escape_string($_GET["email"]);
		$token = $connection->real_escape_string($_GET["token"]);
		echo '
			<label>Email: <input type="text" name="email" value="'. $email .'" readonly></label><br>
			<label>Token: <input type="text" name="token" value="'. $token .'" readonly></label>
			</form>
		';

		$data = $connection->query("SELECT id FROM tbl_user WHERE email='$email' AND token='$token'");

		if ($data->num_rows > 0) {

		}
		else {
			echo "Invalid code.";
		}
	}
	else {
		header("Location: index.php");
		exit();
	}
?>