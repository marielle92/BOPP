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

			$_SESSION["time"] = $_POST["time"];

			$time = $_POST["time"];
			$date = $_POST["reservationDate"];
			$amenity = $_POST["amenity"];
			$contactNumber = $_POST["contactNumber"];

			$user_id = $_SESSION["id"]; //user_id
			$arrlength = count($amenity);
			$signupSql = "INSERT INTO tbl_reservation (contactNumber, reservedDate, time, user_id) VALUES ('$contactNumber', '$date', '$time', '$user_id')";

			if ($cn->query($signupSql) === TRUE) {
				$latestId = $cn->insert_id; {
          for($i=0; $i < $arrlength; $i++) {
          	$arrAmenity = $amenity[$i];
          	$amenitySql = "INSERT INTO tbl_reservation_amenities (reservation_id, amenity_id) values ('$latestId', '$arrAmenity')";
          	$_SESSION["reservationId"] = $latestId;
      			$cn->query($amenitySql);

      		}
      		//redirect to page
      		header('Location: user_payment.php');
      		exit();
      	}
      }
	    else {
      	$msg = $cn->error;
        echo "ERROR with tbl_reservation: " . $msg . '<br>';
        echo "post: " . $_POST["reservationDate"] . '<br>';
        echo "var: " . $date . "<br>";
	    }
		?>
	</body>
</html>