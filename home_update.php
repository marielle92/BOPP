<?php

	require 'connection.php';

	if(isSet($_POST["homeId"])) {
		$homeId = $_POST["homeId"];
		$homeImageDescription = $_POST["homeImageDescription"];
		
		$updateHomeSql = "UPDATE tbl_home SET imageDescription='$homeImageDescription' WHERE id='$homeId';";
		if ($cn->query($updateHomeSql) === TRUE) {
			echo '<script> alert("Description updated."); window.location.href="admin_content_home.php"; </script>'; 
	  }
	  else {
	    $msg = $cn->error;
	    echo '<script> alert("ERROR' . $msg . '"); window.location.href="admin_content_home.php"; </script> ';
	  }
	}

?>