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
			$_SESSION["reservationDate"] = $_POST["reservationDate"];

			$time = $_POST["time"];
			$date = $_POST["reservationDate"];
			$amenity = $_POST["amenity"];
			$contactNumber = $_POST["contactNumber"];

			$reservationDate = strval($_SESSION["reservationDate"]);
			$reservationTime = strval($_SESSION["time"]);

	    $reservationsSql = "SELECT reservedDate, time FROM tbl_reservation WHERE reservedDate LIKE '%$reservationDate%'";
	    $reservationsResult = $cn->query($reservationsSql);
	    if ($reservationsResult->num_rows > 0) {
	      while($row = $reservationsResult->fetch_assoc()) {
	      	$reservedTime = $row["time"];
	        $reservedDate = $row["reservedDate"];
	        if ($reservationDate == $reservedDate && $reservationTime == $reservedTime) {
	          echo '<script> alert("Selected date ' . $date . ' is blocked for ' . $reservedTime . ' swim. Please choose another date or time."); window.location.href="user_reservation.php"; </script>';
	        }
	      }
	    }
	    else {
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
	      	}
	      		header('Location: user_payment.php');
	      		exit();
	      }
	      else {
		    	$msg = $cn->error;
		      echo "ERROR with tbl_reservation: " . $msg . '<br>';
		      echo "post: " . $_POST["reservationDate"] . '<br>';
		      echo "var: " . $date . "<br>";
		    }
		  }

		?>
	</body>
</html>