<?php
	session_start();

	$cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
    if($cn->connect_errno > 0) {
      die('Unable to connect to database [' . $cn->connect_error . ']');
    }
?>
<html>
<head>
	<title>Redirect</title>
</head>
	<body>
		<?php
			$_SESSION["firstName"] = $_POST["firstName"];
			$_SESSION["middleName"] = $_POST["middleName"];
			$_SESSION["lastName"] = $_POST["lastName"];
			$_SESSION["email"] = $_POST["email"];
			$_SESSION["username"] = $_POST["username"];
			// $_SESSION["password"] = $_POST["password"];

			$firstName = $_SESSION["firstName"];
			$middleName = $_SESSION["middleName"];
			$lastName = $_SESSION["lastName"];
			$email = $_SESSION["email"];
			$username = $_SESSION["username"];
			$password = md5($_POST["password"], FALSE);

			if (
				$_SESSION["firstName"] == $_POST["firstName"] ||
				$_SESSION["middleName"] == $_POST["middleName"] ||
				$_SESSION["lastName"] == $_POST["lastName"] ||
				$_SESSION["email"] == $_POST["email"] ||
				$_SESSION["username"] == $_POST["username"]
				// $_SESSION["password"] == $_POST["password"]
				) {

				echo '<script> alert("Registration successful."); window.location.href="index.php"; </script>';

				$signupSql = "INSERT INTO tbl_user (levelOfAccess, firstName, middleName, lastName, email, username, password) VALUES ('User', '$firstName', '$middleName', '$lastName', '$email', '$username', '$password')";
				if ($cn->query($signupSql) === TRUE) {
              echo '<p style="text-align:center; padding-top: 20%;">Saved</p>';
            }
          else {
            	$msg = $cn->error;
              echo '<p style="text-align:center; padding-top: 20%;">ERROR</p> ' . $msg;
            }	
				}
			else {
				echo '<script> alert("Registration failed."); window.location.href="index.php"; </script>';
			}
		?>
	</body>
</html>