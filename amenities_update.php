<?php

	require 'connection.php';

	if(isSet($_POST["amenitiesId"])) {
		$amenitiesId = $_POST["amenitiesId"];
		$amenitiesName = $_POST["amenitiesName"];
		$price = $_POST["price"];
		$description = $_POST["description"];

		$updateAmenitiesSql = "UPDATE tbl_ratesandamenities SET amenityName='$amenitiesName', price='$price', description='$description' WHERE id='$amenitiesId';";
		if ($cn->query($updateAmenitiesSql) === TRUE) {
			echo '<script> alert("Description updated."); window.location.href="admin_content_amenities.php"; </script>';
	  }
	  else {
	    $msg = $cn->error;
	    echo '<script> alert("ERROR' . $msg . '"); window.location.href="admin_content_amenities.php"; </script> ';
	  }
	}

?>