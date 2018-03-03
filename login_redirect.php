<?php
	
?>
<?php
	session_start();
  require 'connection.php';
?>
<html>
<head>
	<title>Log In Redirect</title>
</head>
<body>
	<?php
		$login_username = $_POST["login_username"];
		$post_password = $_POST["login_password"];
		$login_password = md5($post_password, FALSE);

		$sql = "SELECT * FROM tbl_user WHERE username='$login_username'";
		$result = $cn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      		if ($login_password == $row["password"]) {
            $accessLevel = $row["levelOfAccess"];
            if ($accessLevel == 'Manager') {
        			header('Location: admin_notifications.php');
              $_SESSION["id"] = $row["id"];

              //tbl_logs
              date_default_timezone_set("Asia/Manila");
              $user_id = $_SESSION["id"];
              $dateTime = date("Y-m-d ") . date("H:i:s");
              $logSql = "INSERT INTO tbl_logs (user_id, log_dateTime, action) VALUES ('$user_id', '$dateTime', 'Log In')";
              $cn->query($logSql);
              exit();
            }
            else {
              header('Location: user_reservation.php');
              $_SESSION["id"] = $row["id"];

              //tbl_logs
              date_default_timezone_set("Asia/Manila");
              $user_id = $_SESSION["id"];
              $dateTime = date("Y-m-d ") . date("H:i:s");
              $logSql = "INSERT INTO tbl_logs (user_id, log_dateTime, action) VALUES ('$user_id', '$dateTime', 'Log In')";
              $cn->query($logSql);
              exit();
            }
      		}
    			else {
    				echo '<script> alert("Invalid username or password"); window.location.href="index.php"; </script>';
    			}
        }
      }
    else {
      echo '<script> alert("User not registered"); window.location.href="index.php"; </script>';
      }
					
	?>
</body>
</html>