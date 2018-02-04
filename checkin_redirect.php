<?php
	$cn = mysqli_connect('localhost', 'root', '', 'blueoasis');
  if($cn->connect_errno > 0) {
    die('Unable to connect to database [' . $cn->connect_error . ']');
  }

  $amenityId = $_POST["amenityId"];
  $equipmentSql = "SELECT * FROM tbl_equipment WHERE amenity_id = '$amenityId'";
  $equipmentResult = $cn->query($equipmentSql);
  if ($equipmentResult->num_rows > 0) {
    while($equipmentRow = $equipmentResult->fetch_assoc()) {
    	$equipmentId = $equipmentRow["id"];
    	$comment = $_POST[$equipmentId . '-Comment'];
    	$status = $_POST[$equipmentId . '-Status'];

    	$updateSql = "UPDATE tbl_equipment SET latestStatus = '$status', latestComment = '$comment' WHERE id = '$equipmentId'";
    	if($cn->query($updateSql) === TRUE) {
				echo '<script> alert("Equipment update successful."); window.location.href="user_checkin.php"; </script>';
      }
      else {
      	$msg = $cn->error;
        echo '<script> alert("Error ' . $msg . '"); window.location.href="user_checkin.php"; </script>';
      }	
    }
  }
?>