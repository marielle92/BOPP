<?php
	session_start();

	require 'connection.php';

    $paymentId = $_SESSION["paymentId"];

?>
<html>
<head>
	<title>Redirect</title>
</head>
	<body>
		<?php

			date_default_timezone_set("Asia/Manila");
			$dateTime = date("Y-m-d ") . date("H:i:s");


        $payIdSql = "UPDATE tbl_payment SET paymentStatus='DPpaid', dpPaidOn='$dateTime'  WHERE id = '$paymentId'";
        if($cn->query($payIdSql) === TRUE) {
        	//header ('Location: paypal.php');

        	echo '<script> alert("Thank you! Your reservation will be reviewed.");  window.location.href="user_reservation.php"; </script>';
        }
        else {
        	echo '<script> alert("INSERT ERROR MESSAGE HERE");  window.location.href="user_payment.php"; </script>';
        }
	?>
	</body>
</html>