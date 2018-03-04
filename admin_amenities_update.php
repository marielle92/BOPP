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

      $amenityId = $_POST["amenityId"];
      $amenityName = $_POST["amenityName"];
      $amenityDescription = $_POST["amenityDescription"];
      $amenityPrice = $_POST["amenityPrice"];

        $reservationSql = "UPDATE tbl_amenities SET amenityName='$amenityName', amenityDescription='$amenityDescription', amenityPrice='$amenityPrice' WHERE id = '$amenityId'";
        if($cn->query($reservationSql) === TRUE) {
        	//header ('Location: paypal.php');

        	echo '<script> alert("Row updated");  window.location.href="admin_amenities.php"; </script>';
        }
        else {
        	echo '<script> alert("Update failed");  window.location.href="admin_amenities_update.php"; </script>';
        }
	?>
	</body>
</html>