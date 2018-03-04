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

      $reservationId = $_POST["reservationId"];
      $contactNumber = $_POST["contactNumber"];
      $reservedDate = $_POST["reservedDate"];
      $time = $_POST["time"];

        $reservationSql = "UPDATE tbl_reservation SET contactNumber='$contactNumber', reservedDate='$reservedDate', time='$time'  WHERE id = '$reservationId'";
        if($cn->query($reservationSql) === TRUE) {
        	//header ('Location: paypal.php');

        	echo '<script> alert("Row updated");  window.location.href="admin_reservations.php"; </script>';
        }
        else {
        	echo '<script> alert("Update failed");  window.location.href="reservation_update.php"; </script>';
        }
	?>
	</body>
</html>