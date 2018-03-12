<?php
	session_start();

	require 'connection.php';

?>
<html>
<head>
	<title>Redirect</title>
</head>
	<body>
		<?php
    /*
    if (isset($_POST['userId'])) {
      $userId = $_POST['userId'];
    }
    if (isset($_POST['levelOfAccess'])) {
        $levelOfAccess = $_POST['levelOfAccess'];
    }
    if (isset($_POST['firstName'])) {
        $firstName = $_POST['firstName'];
    }
    if (isset($_POST['middleName'])) {
    $middleName = $_POST['middleName'];
    }
    if (isset($_POST['lastName'])) {
      $lastName = $_POST['lastName'];
    }
    if (isset($_POST['email'])) {
      $email = $_POST['email'];
    }
    if (isset($_POST['username'])) {
      $username = $_POST['username'];
    }
    if (isset($_POST['status'])) {
      $status = $_POST['status'];
    }
      */
      $userId = $_POST["userId"];
      $levelOfAccess = $_POST["levelOfAccess"];
      $firstName = $_POST["firstName"];
      $middleName = $_POST["middleName"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $username = $_POST["username"];
      $status = $_POST["status"];

        $userSql = "UPDATE tbl_user SET levelOfAccess='$levelOfAccess', firstName='$firstName', middleName='$middleName', lastName='$lastName', email='$email', username='$username', status='$status',  WHERE id='$userId'";
        if($cn->query($userSql) === TRUE) {
        	//header ('Location: paypal.php');

        	echo '<script> alert("Row updated");  window.location.href="admin_users.php"; </script>';
        }
        else {
         echo '<script> alert("Update failed");  window.location.href="user_update.php"; </script>';
        }
	?>
	</body>
</html>