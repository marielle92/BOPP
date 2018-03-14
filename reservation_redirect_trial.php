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

			//get promo code
			$_SESSION["promoCode"] = $_POST["promoCode"];
	    $promoCode = $_SESSION["promoCode"];
	    $promoSql = "SELECT * FROM tbl_promocode where promoCode='$promoCode'";
	    $promoResult = $cn->query($promoSql);
	    if ($promoResult->num_rows > 0) {
	      while($row = $promoResult->fetch_assoc()) {
	        $promoId = $row["id"];
	      }
	      //echo '<script> alert("Promo code is: ' . $_SESSION["promoCode"] . ' Promo value is: ' . $_SESSION["promoValue"] . '"); window.location.href="user_reservation.php"; </script>';
	    }
	    else {
	      $promoId = 0;
	      //echo '<script> alert("Promo code is: ' . $_SESSION["promoCode"] . ' Promo value is: ' . $_SESSION["promoValue"] . '"); window.location.href="user_reservation.php"; </script>';
	    }

			$_SESSION["time"] = $_POST["time"];
			$_SESSION["reservationDate"] = $_POST["reservationDate"];

			$time = $_POST["time"];
			$date = (string)$_POST["reservationDate"];
			$amenity = $_POST["amenity"];
			$contactNumber = $_POST["contactNumber"];

	    $reservationsSql = "SELECT reservedDate, time FROM tbl_reservation WHERE reservedDate LIKE '%$date%' AND time LIKE '%$time%'";
	    $reservationsResult = $cn->query($reservationsSql);

	    if ($reservationsResult->num_rows > 0) {
	        echo '<script> alert("Selected date ' . $date . ' is blocked for ' . $time . ' swim. Please choose another date or time."); window.location.href="user_reservation.php"; </script>';
	      }
	    else {

	    	$user_id = $_SESSION["id"]; //user_id
				$arrlength = count($amenity);
				$signupSql = "INSERT INTO tbl_reservation (contactNumber, reservedDate, time, user_id, promo_id) VALUES ('$contactNumber', '$date', '$time', '$user_id', '$promoId')";

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