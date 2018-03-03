<?php

	 require 'connection.php';

    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    $email = $_POST["email"];
    $token = $_POST["token"];
    $url = "reset_password.php?token=" . $token . "&email=" . $email;
?>
<html>
<head>
	<title>Reset Password Redirect</title>
</head>
	<body>
		<?php
		   if ($password1 == $password2) {
        $password = md5($password2, FALSE);
        $sql = "UPDATE tbl_user SET password='$password', token=NULL WHERE token='$token' AND email='$email'";
        if($cn->query($sql) === TRUE) {
          echo '<script> alert("Password changed successfully.");  window.location.href="index.php"; </script>';
          $token = "NULL";
        }
        else {
          echo '<script> alert("Invalid password. Please try again.");  window.location.href="reset_password.php"; </script>';
        }
       }
       else {
          echo '
            <script>
              var url = ""' . $url . '""; 
              alert("Password mismatch. Please try again.");  window.location.href=url;
            </script>';
       }
        
	   ?>
	</body>
</html>