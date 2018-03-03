<?php
	require 'connection.php';

	if(isSet($_POST["amenitiesId"])) {
		$amenitiesId = $_POST["amenitiesId"];

		$deleteAmenitiesSql = "DELETE FROM tbl_ratesandamenities WHERE id='$amenitiesId'";
		if ($cn->query($deleteAmenitiesSql) === TRUE) {
			echo '<script> alert("Amenity deleted.");  window.location.href="admin_content_amenities.php"; </script>';
	  }
	  else {
	    $msg = $cn->error;
	    echo '<script> alert("ERROR' . $msg . '"); window.location.href="admin_content_amenities.php"; </script> ';
	  }
	}
?>