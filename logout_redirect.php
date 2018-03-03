<?php
	
?>
<?php
	session_start();

	require 'connection.php';
?>
<html>
<head>
	<title>Log Out Redirect</title>
</head>
<body>
	<?php
    date_default_timezone_set("Asia/Manila");
    $user_id = $_SESSION["id"];
    $dateTime = date("Y-m-d ") . date("H:i:s");
    $logSql = "INSERT INTO tbl_logs (user_id, log_dateTime, action) VALUES ('$user_id', '$dateTime', 'Log Out')";
    $cn->query($logSql);
    session_unset();
    header('Location: index.php');
    exit();				
	?>
</body>
</html>