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
			$reservationId = $_POST["reservationId"];
			$time = $_POST["time"];
			$date = $_POST["reservationDate"];
			$amenity = $_POST["amenity"];
			$contactNumber = $_POST["contactNumber"];

			$user_id = $_SESSION["id"]; //user_id
			$arrlength = count($amenity);
			$signupSql = "UPDATE tbl_reservation SET contactNumber='$contactNumber', reservedDate = '$date', time = '$time' WHERE id = " . (int) $reservationId;

			if ($cn->query($signupSql) === TRUE) {
				$deleteAmenitiesSql = "DELETE FROM tbl_reservation_amenities WHERE reservation_id = ". (int) $reservationId;
				echo $deleteAmenitiesSql;
				$cn->query($deleteAmenitiesSql);
		        for($i=0; $i < $arrlength; $i++) {
		          	$arrAmenity = $amenity[$i];
		          	$amenitySql = "INSERT INTO tbl_reservation_amenities (reservation_id, amenity_id) values ('". (int) $reservationId ."', '$arrAmenity')";
		          	$_SESSION["reservationId"] = $reservationId;
		      		$cn->query($amenitySql);
	      		}
	      		//redirect to page
	      		header('Location: user_payment.php');
	      		exit();
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