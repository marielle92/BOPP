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
			$firstName = $_POST["firstName"];
			$middleName = $_POST["middleName"];
			$lastName = $_POST["lastName"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			$password = md5($_POST["password"], FALSE);

			if (
				!empty($firstName) ||
				!empty($middleName) ||
				!empty($lastName) ||
				!empty($email) ||
				!empty($username)
			) {
				$signupSql = "INSERT INTO tbl_user (levelOfAccess, firstName, middleName, lastName, email, username, password, status) VALUES ('User', '$firstName', '$middleName', '$lastName', '$email', '$username', '$password', NULL)";
				
				if ($cn->query($signupSql) === TRUE) {
					echo '<script> alert("Registration successful."); window.location.href="index.php"; </script>';
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